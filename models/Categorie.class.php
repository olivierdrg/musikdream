<?php

class Categorie {

    private $id;
    private $photo;
    private $nom;
    private $description;


    public function getId() {
        return $this->id;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }
    


    public function setPhoto( $photo ) {
        if ( filter_var( $photo['photo']['value'], FILTER_VALIDATE_URL ) == false )
            throw new Exception ("Ajouter l'URL de l'image");            

        $this->photo = $photo;
    }



    public function setNom( $nom ) {
        if ( strlen( $nom ) < 3 ) 
            throw new Exception ("Nom de la catégorie trop court (< 3)");
        else if ( strlen( $nom ) > 31 )
            throw new Exception ("Nom de la catégorie trop long (> 31)");            

        $this->nom = $nom;
    }



    public function setDescription( $description ) {
        if ( strlen( $description ) < 10 ) 
            throw new Exception ("Descriptif de la catégorie trop court (< 10)");
        else if ( strlen( $description ) > 1023 )
            throw new Exception ("Descriptif de la catégorie trop long (> 1023)");            

        $this->description = $description;
    }
    
}

?>