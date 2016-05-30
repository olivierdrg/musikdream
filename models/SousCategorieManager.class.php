<?php

class SousCategorieManager
{
    private $link;

    public function __construct( $link ) {
        $this->link = $link;
    }



    public function findAll() {
        $list = [];
        $request = "SELECT * FROM sous_categorie";
        $res = mysqli_query( $this->link, $request );
        while ($sous_categorie = mysqli_fetch_object( $res, "SousCategorie" ) )
            $list[] = $sous_categorie;
        return $list;
    }



    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM sous_categorie WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $sous_categorie = mysqli_fetch_object( $res, "SousCategorie" );
        return $sous_categorie;
    }  



    public function getById( $id ) {
        return $this->findById( $id );
    }



    public function create( $data ) {

        $sous_categorie = new SousCategorie();

        if ( !isset( $data['id_categorie'] ) ) throw new Exception ("Sous-catégorie manquante");
        if ( !isset( $data['photo'] ) ) throw new Exception ("Photo de la sous-catégorie manquante");
        if ( !isset( $data['nom'] ) ) throw new Exception ("Nom de la sous-catégorie manquant");
        if ( !isset( $data['description'] ) ) throw new Exception ("Description de la sous-catégorie manquante");

        $sous_categorie->setIdCategorie( $data['id_categorie'] );
        $sous_categorie->setPhoto( $data['photo'] );
        $sous_categorie->setNom( $data['nom'] );
        $sous_categorie->setDescription( $data['description'];

        $id_categorie    = mysqli_real_escape_string( $this->link, $sous_categorie->getIdCategorie() );
        $photo           = mysqli_real_escape_string( $this->link, $sous_categorie->getPhoto() );
        $nom             = mysqli_real_escape_string( $this->link, $sous_categorie->getNom() );
        $description     = mysqli_real_escape_string( $this->link, $sous_categorie->getDescription() );

        $request = "INSERT INTO sous_categorie (id_categorie, photo, nom, description) 
            VALUES('" . $id_categorie . "', '" . $photo . "', '" . $nom . "', '" . $description . "')";

        $res = mysqli_query( $this->link, $request );
        

        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            

            if ( $id ) {
                $sous_categorie = $this->findById( $id );
                return $sous_categorie;    
            }
            else
                throw new Exception ("Internal server error");                
        }
        else
            throw new Exception ("Internal server error");
                
    }    



    public function update( SousCategorie $sous_categorie ) {
        $id = $sous_categorie->getId();

        if ($id) {
            $id_categorie   = mysqli_real_escape_string( $this->link, $sous_categorie->getIdCategorie());
            $photo          = mysqli_real_escape_string( $this->link, $sous_categorie->getPhoto());
            $nom            = mysqli_real_escape_string( $this->link, $sous_categorie->getNom());
            $description    = mysqli_real_escape_string( $this->link, $sous_categorie->getDescription());

            $request = "UPDATE sous_categorie SET id_categorie='" . $id_categorie . "', photo='" . $photo . "', nom='" . $nom . "', description='" . $description . "' WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }



    public function remove( SousCategorie $sous_categorie ) {
        $id = $sous_categorie->getId();

        if ( $id ) {// true si > 0
        
            $request = "DELETE FROM categorie WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $sous_categorie; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }

}
?>

