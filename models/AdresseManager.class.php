<?php
// models/AdresseManager.class.php

class AdresseManager
{
    private $link;

    // Liste des fonctions magiques en php : http://php.net/manual/fr/language.oop5.magic.php
    public function __construct( $link ) {
        $this->link = $link;
    }

    public function findAll() {
        $list = [];
        $request = "SELECT * FROM adresse";
        $res = mysqli_query( $this->link, $request );
        while ($adresse = mysqli_fetch_object( $res, "Adresse" ) )
            $list[] = $adresse;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM adresse WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $adresse = mysqli_fetch_object( $res, "Adresse" );
        return $adresse;
    }  

    public function getById( $id ) {
        return $this->findById( $id );
    }

    public function create( $data ) {

        $adresse = new Adresse();

        if ( !isset( $data['designation'] ) ) throw new Exception ("designation manquante");
        if ( !isset( $data['rue'] ) ) throw new Exception ("Nom de rue manquant");
        if ( !isset( $data['cp'] ) ) throw new Exception ("Code postal manquant");
        if ( !isset( $data['ville'] ) ) throw new Exception ("nom de ville manquant");
        if ( !isset( $data['pays'] ) ) throw new Exception ("Nom de pays manquant");
        if ( !isset( $data['type'] ) ) throw new Exception ("Type manquante");

        // if ( $data['mot_passe'] !=  $data['confirme_mot_passe'] ) throw new Exception ("Mot de passe incorrect");

        $adresse->setIdUtilisateur( $data['id_utilisateur'] );
        $adresse->setDesignation( $data['designation'] );
        $adresse->setRue( $data['rue'] );
        $adresse->setCp( $data['cp'] );
        $adresse->setVille( $data['ville'] );
        $adresse->setPays( $data['pays'] );
        $adresse->setType( $data['type'] );


        $id_utilisateur     = mysqli_real_escape_string( $this->link, $adresse->getIdUtilisateur() );
        $designation        = mysqli_real_escape_string( $this->link, $adresse->getDesignation() );
        $rue                = mysqli_real_escape_string( $this->link, $adresse->getRue() );
        $cp                 = mysqli_real_escape_string( $this->link, $adresse->getCp() );
        $ville              = mysqli_real_escape_string( $this->link, $adresse->getVille() );
        $pays               = mysqli_real_escape_string( $this->link, $adresse->getPays() );
        $type               = mysqli_real_escape_string( $this->link, $adresse->getType() );

        $request = "INSERT INTO adresse (id_utilisateur,designation,rue,cp,ville,pays,type) 
            VALUES( '".$id_utilisateur."','".$designation."','".$rue."','".$cp."',
                    '".$ville."','".$pays."','" . $type . "')";

        $res = mysqli_query( $this->link, $request );
        
        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            
            // si c'est bon id > 0
            if ( $id ) {
                $adresse = $this->findById( $id );
                return $adresse;    
            }
            else// Sinon
                throw new Exception ("Internal server error");                
        }
        else// Sinon
            throw new Exception ("Internal server error");
                
    }    

    public function update( Adresse $adresse ) { // type-hinting
        $id = $adresse->getId();

        if ($id) {// true si > 0
            $designation        = mysqli_real_escape_string( $this->link, $adresse->getDesignation() );
            $rue                = mysqli_real_escape_string( $this->link, $adresse->getRue() );
            $cp                 = mysqli_real_escape_string( $this->link, $adresse->getCp() );
            $ville              = mysqli_real_escape_string( $this->link, $adresse->getVille() );
            $pays               = mysqli_real_escape_string( $this->link, $adresse->getPays() );
            $type               = mysqli_real_escape_string( $this->link, $adresse->getType() );

            $request = "UPDATE adresse SET designation='".$designation."',rue='".$rue."',cp='".$cp."',ville='".$ville."',
                                           pays='".$pays."',type='".$type."' WHERE id=".$id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }

    public function remove(Adresse $adresse ) {
        $id = $adresse->getId();

        if ( $id ) {// true si > 0
        
            $request = "DELETE FROM adresse WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $adresse; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }  
}
?>

