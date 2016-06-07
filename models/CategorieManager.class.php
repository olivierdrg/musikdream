<?php

class CategorieManager
{
    private $link;

    public function __construct( $link ) {
        $this->link = $link;
    }



    public function findAll() {
        $list = [];
        $request = "SELECT * FROM categorie";
        $res = mysqli_query( $this->link, $request );
        while ($categorie = mysqli_fetch_object( $res, "Categorie", array( $this->link ) ) )
            $list[] = $categorie;
        return $list;
    }



    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM categorie WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $categorie = mysqli_fetch_object( $res, "Categorie", array( $this->link ) );
        return $categorie;
    }  



    public function getById( $id ) {
        return $this->findById( $id );
    }



    public function create( $data ) {

        $categorie = new Categorie($this->link);

        if ( !isset( $data['photo'] ) ) throw new Exception ("Photo de la catégorie manquante");
        if ( !isset( $data['nom'] ) ) throw new Exception ("Nom de la catégorie manquant");
        if ( !isset( $data['description'] ) ) throw new Exception ("Description de la catégorie manquante");

        $categorie->setPhoto( $data['photo'] );
        $categorie->setNom( $data['nom'] );
        $categorie->setDescription( $data['description'] );

        $photo           = mysqli_real_escape_string( $this->link, $categorie->getPhoto() );
        $nom             = mysqli_real_escape_string( $this->link, $categorie->getNom() );
        $description     = mysqli_real_escape_string( $this->link, $categorie->getDescription() );

        $request = "INSERT INTO categorie (photo, nom, description) 
            VALUES('" . $photo . "', '" . $nom . "', '" . $description . "')";

        $res = mysqli_query( $this->link, $request );
        

        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            

            if ( $id ) {
                $categorie = $this->findById( $id );
                return $categorie;    
            }
            else
                throw new Exception ("Internal server error");                
        }
        else
            throw new Exception ("Internal server error");
                
    }    



    public function update( Categorie $categorie ) {
        $id = $categorie->getId();

        if ($id) {
            $photo          = mysqli_real_escape_string( $this->link, $categorie->getPhoto());
            $nom            = mysqli_real_escape_string( $this->link, $categorie->getNom());
            $description    = mysqli_real_escape_string( $this->link, $categorie->getDescription());

            $request = "UPDATE categorie SET photo='" . $photo . "', nom='" . $nom . "', description='" . $description . "' WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }



    public function remove( Categorie $categorie ) {
        $id = $categorie->getId();

        if ( $id ) {// true si > 0
        
            $request = "DELETE FROM categorie WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $categorie; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }

}
?>

