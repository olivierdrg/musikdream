<?php
// models/UtilisateurManager.class.php

class UtilisateurManager {
    private $link;

    // Liste des fonctions magiques en php : http://php.net/manual/fr/language.oop5.magic.php
    public function __construct( $link ) {
        $this->link = $link;
    }


    // public function findByAdresseFact() {



    // }


    public function findAll() {
        $list = [];
        $request = "SELECT * FROM utilisateur";
        $res = mysqli_query( $this->link, $request );
        while ($utilisateur = mysqli_fetch_object( $res, "Utilisateur" , [$this->link]) )
            $list[] = $utilisateur;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM utilisateur WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $utilisateur = mysqli_fetch_object( $res, "Utilisateur" , [$this->link]);
        return $utilisateur;
    }  

    public function getById( $id ) {
        return $this->findById( $id );
    }

    public function create( $data ) {

        $utilisateur = new Utilisateur($this->link);

        if ( !isset( $data['nom'] ) ) throw new Exception ("Nom manquant");
        if ( !isset( $data['prenom'] ) ) throw new Exception ("Prénom manquant");
        if ( !isset( $data['email'] ) ) throw new Exception ("Email manquant");
        if ( !isset( $data['mot_passe'] ) ) throw new Exception ("Mot de passe manquant");
        if ( !isset( $data['confirme_mot_passe'] ) ) throw new Exception ("Mot de passe manquant");
        if ( !isset( $data['date_naissance'] ) ) throw new Exception ("Date de naissance manquante");
        if ( !isset( $data['telephone'] ) ) throw new Exception ("Téléphone manquant" ); 
        if ( !isset( $data['login'] ) ) throw new Exception ("Login manquant");                 
    
        if ( $data['mot_passe'] !=  $data['confirme_mot_passe'] ) throw new Exception ("Mot de passe incorrect");

        

        $utilisateur->setNom( $data['nom'] );
        $utilisateur->setPrenom( $data['prenom'] );
        $utilisateur->setEmail( $data['email'] );
        $utilisateur->setMotPasse( password_hash( $data['mot_passe'], PASSWORD_BCRYPT, array( 'cost' => 8 ) ) );
        $utilisateur->setDateNaissance( $data['date_naissance'] );
        $utilisateur->setTelephone( $data['telephone'] );
        $utilisateur->setLogin( $data['login'] );
        // $id = $utilisateur->getId();

        $nom                = mysqli_real_escape_string( $this->link, $utilisateur->getNom() );
        $prenom             = mysqli_real_escape_string( $this->link, $utilisateur->getPrenom() );
        $email              = mysqli_real_escape_string( $this->link, $utilisateur->getEmail() );
        $mot_passe          = $utilisateur->getMotPasse();
        $date_naissance     = mysqli_real_escape_string( $this->link, $utilisateur->getDateNaissance() );
        $telephone          = mysqli_real_escape_string( $this->link, $utilisateur->getTelephone() );
        $login              = mysqli_real_escape_string( $this->link, $utilisateur->getLogin() );

        $request = "INSERT INTO utilisateur (nom, prenom, email,mot_passe, date_naissance,telephone, login) 
            VALUES('" . $nom . "', '" . $prenom . "', '" . $email . "', '" . $mot_passe . "', '" . $date_naissance . "', '" . $telephone . "', '" . $login . "')";

        $res = mysqli_query( $this->link, $request );
        
        $request = "INSERT INTO adresse (id_utilisateur,designation,rue,cp,ville,pays,type)
                    VALUES('".$id."','','','','','','0')";
        $res0 = mysqli_query( $this->link, $request );


        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            
            // si c'est bon id > 0
            if ( $id ) {
                $utilisateur = $this->findById( $id );

                // création des adresses
                $request = "INSERT INTO adresse (id_utilisateur,designation,rue,cp,ville,pays,type)
                            VALUES('".$id."','','','','','','0')";
                $res0 = mysqli_query( $this->link, $request );

                $request = "INSERT INTO adresse (id_utilisateur,designation,rue,cp,ville,pays,type)
                            VALUES('".$id."','','','','','','1')";
                $res1 = mysqli_query( $this->link, $request );

                return $utilisateur;    
            }
            else// Sinon
                throw new Exception ("Internal server error0");                
        }
        else// Sinon
            throw new Exception ("Internal server error1");
                
    }    

    public function remove(Utilisateur $utilisateur ) {
        $id = $utilisateur->getId();

        if ( $id ) {// true si > 0
        
            $request = "DELETE FROM utilisateur WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $utilisateur; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }  

    public function login( $data ) {  
        $utilisateur = new Utilisateur($this->link);

        
        if ( !isset( $data['mot_passe'] ) ) throw new Exception ("Mot de passe manquant");
        if ( !isset( $data['login'] ) ) throw new Exception ("Login manquant");                 
    
        $mot_passe = $data['mot_passe'];
        $login     = $data['login'];

        $request = 'SELECT id, mot_passe, login, admin FROM utilisateur WHERE login="' . $login . '" LIMIT 1';

        $res = mysqli_query( $this->link, $request ); 
         
        $ligne = mysqli_fetch_assoc( $res );
        if ( password_verify( $mot_passe, $ligne['mot_passe']) ) {
            $_SESSION['id'] = $ligne['id'];
            $_SESSION['login'] = $ligne['login'];
            $_SESSION['admin'] = $ligne['admin'];
        }
    }


    public function update( Utilisateur $utilisateur ) { // type-hinting
        $id = $utilisateur->getId();

        if ($id) {// true si > 0
            $nom                = mysqli_real_escape_string( $this->link, $utilisateur->getNom());
            $prenom             = mysqli_real_escape_string( $this->link, $utilisateur->getPrenom());
            $email              = mysqli_real_escape_string( $this->link, $utilisateur->getEmail());
            $mot_passe          = mysqli_real_escape_string( $this->link, $utilisateur->getMotPasse());
            $date_naissance     = mysqli_real_escape_string( $this->link, $utilisateur->getDateNaissance());
            $telephone          = mysqli_real_escape_string( $this->link, $utilisateur->getTelephone());
            $sexe               = mysqli_real_escape_string( $this->link, $utilisateur->getSexe());
            $login              = mysqli_real_escape_string( $this->link, $utilisateur->getLogin());

            $request = "UPDATE utilisateur SET  nom='" . $nom . "', prenom='" . $prenom . "', email='" . $email . "', 
                                                mot_passe='" . $mot_passe . "', date_naissance='" . $date_naissance . "',
                                                telephone='" . $telephone . "', sexe='".$sexe."',
                                                login='" . $login . "' WHERE id=" . $id;

            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }

}
?>
