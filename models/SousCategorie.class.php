<?php

class SousCategorie {

    private $id;
    private $id_categorie;
    private $photo;
    private $nom;
    private $description;


    public function getId() {
        return $this->id;
    }

    public function getIdCategorie() {
        return $this->id_categorie;
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
    


    public function setIdCategorie( $id_categorie ) {
        $id_categorie = intval( $id_categorie );           
        $this->id_categorie = $id_categorie;
    }

    public function setPhoto( $photo ) {
        if ( filter_var( $photo['photo']['value'], FILTER_VALIDATE_URL ) == false )
            throw new Exception ("Ajouter l'URL de l'image");            

        $this->photo = $photo;
    }

    public function setNom( $nom ) {
        if ( strlen( $nom ) < 3 ) 
            throw new Exception ("Nom de la sous-catégorie trop court (< 3)");
        else if ( strlen( $nom ) > 31 )
            throw new Exception ("Nom de la sous-catégorie trop long (> 31)");            

        $this->nom = $nom;
    }

    public function setDescription( $description ) {
        if ( strlen( $description ) < 10 ) 
            throw new Exception ("Descriptif de la sous-catégorie trop court (< 10)");
        else if ( strlen( $description ) > 1023 )
            throw new Exception ("Descriptif de la sous-catégorie trop long (> 1023)");            

        $this->description = $description;
    }
    
    public function selected( $selected, $current ) {
        if ( $selected == $current ) return 'selected';
            else return '';
    }
}

?>