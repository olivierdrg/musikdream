<?php
// models/PanierManager.class.php

class PanierManager
{
    private $link;

    // Liste des fonctions magiques en php : http://php.net/manual/fr/language.oop5.magic.php
    public function __construct( $link ) {
        $this->link = $link;
    }

    public function findAll() {
        $list = [];
        $request = "SELECT * FROM panier";
        $res = mysqli_query( $this->link, $request );
        while ($panier = mysqli_fetch_object( $res, "Panier" ) )
            $list[] = $panier;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM panier WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" );
        return $panier;
    }  

    public function findByIdUtilisateur( $id_utilisateur ) {
        $id_utilisateur = intval( $id_utilisateur );
        $request = "SELECT * FROM panier WHERE id_utilisateur = " . $id_utilisateur;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" );
        return $panier;
    }  

    public function findByStatus( $status ) {
        $status = intval( $status );
        $request = "SELECT * FROM panier WHERE status = " . $status;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" );
        return $panier;
    }  


    public function getById( $id ) {
        return $this->findById( $id );
    }

    public function create( $data ) {

        $panier = new Panier();

        if ( !isset( $data['id_utilisateur'] ) ) throw new Exception ("id_utilisateur manquante");
        if ( !isset( $data['date'] ) ) throw new Exception ("Date manquant");
        if ( !isset( $data['status'] ) ) throw new Exception ("Status manquant");
        if ( !isset( $data['prix'] ) ) throw new Exception ("prix manquant");
        if ( !isset( $data['quantite'] ) ) throw new Exception ("Quantité manquante");
        if ( !isset( $data['poids'] ) ) throw new Exception ("Poids manquant");

        // if ( $data['mot_passe'] !=  $data['confirme_mot_passe'] ) throw new Exception ("Mot de passe incorrect");

        $panier->setIdUtilisateur( $data['id_utilisateur'] );
        $panier->setDate( $data['date'] );
        $panier->setStatus( $data['status'] );
        $panier->setPrix( $data['prix'] );
        $panier->setQuantite( $data['quantite'] );
        $panier->setPoids( $data['poids'] );


        $id_utilisateur = mysqli_real_escape_string( $this->link, $panier->getIdUtilisateur() );
        $date           = mysqli_real_escape_string( $this->link, $panier->getDate() );
        $status         = mysqli_real_escape_string( $this->link, $panier->getStatus() );
        $prix           = mysqli_real_escape_string( $this->link, $panier->getPrix() );
        $quantite       = mysqli_real_escape_string( $this->link, $panier->getQuantite() );
        $poids          = mysqli_real_escape_string( $this->link, $panier->getPoids() );

        $request = "INSERT INTO panier (id_utilisateur,`date`,status,prix,quantite,poids) 
            VALUES( '".$id_utilisateur."','".$date."','".$status."',
                    '".$prix."','".$quantite."','" . $poids . "')";

        $res = mysqli_query( $this->link, $request );
        
        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            
            // si c'est bon id > 0
            if ( $id ) {
                $panier = $this->findById( $id );
                return $panier;    
            }
            else// Sinon
                throw new Exception ("Internal server error");                
        }
        else// Sinon
            throw new Exception ("Internal server error");
                
    }    

    public function update( Panier $panier ) { // poids-hinting
        $id = $panier->getId();

        if ($id) {// tdate si > 0
            $id_utilisateur = mysqli_real_escape_string( $this->link, $panier->getId_utilisateur() );
            $date           = mysqli_real_escape_string( $this->link, $panier->getDate() );
            $status         = mysqli_real_escape_string( $this->link, $panier->getstatus() );
            $prix           = mysqli_real_escape_string( $this->link, $panier->getPrix() );
            $quantite       = mysqli_real_escape_string( $this->link, $panier->getQuantite() );
            $poids          = mysqli_real_escape_string( $this->link, $panier->getPoids() );

            $request = "UPDATE panier SET id_utilisateur='".$id_utilisateur."',date='".$date."',status='".$status."',prix='".$prix."',
                                           quantite='".$quantite."',poids='".$poids."' WHERE id=".$id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }

    public function remove(Panier $panier ) {
        $id = $panier->getId();

        if ( $id ) {// tdate si > 0
        
            $request = "DELETE FROM panier WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $panier; // ou tdate
            else
                throw new Exception ("Internal server error");
        }
    }  
}
?>

