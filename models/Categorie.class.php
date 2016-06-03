<?php

class Categorie {

    private $id;
    private $photo;
    private $nom;
    private $description;

    private $sous_categories;

    private $link;

    public function __construct( $link ) {
        $this->link = $link;
    }

    public function getSousCategories() {
        if ($this->sous_categories === null)
        {
            $manager = new SousCategorieManager( $this->link );
            $this->sous_categories = $manager->findByCategory( $this );
        }
        return $this->sous_categories;
    }

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
    
    public function selected( $selected, $current ) {
        if ( $selected == $current ) return 'selected';
            else return '';
    }

}

?>