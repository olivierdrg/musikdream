<?php
/**
* @file : Produit.class.php
*
*/
class Produit {

    private $id;
    private $id_sous_categorie;
    private $reference;
    private $stock;
    private $prix_ht;
    private $tva;
    private $description;
    private $photo;
    private $nom;
    private $poids;
    private $actif;
    private $sous_categorie;
    private $link;

    private $avis;

    public function __construct( $link ) {
        $this->link = $link;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdSousCategorie() {
        return $this->id_sous_categorie;
    }

    public function getSousCategorie() {
        $id = $this->getIdSousCategorie();

        $manager = new SousCategorieManager( $this->link );
        $this->sous_categorie = $manager->findById( $id );

        return $this->sous_categorie;
    }

    public function getReference() {
        return $this->reference;
    }
    public function getStock() {
        return $this->stock;
    }

    public function getPrixHt() {
        return $this->prix_ht;
    }

    public function getTva() {
        return $this->tva;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPoids() {
        return $this->poids;
    }

    public function getActif() {
        return $this->actif;
    }
    
    public function setIdSousCategorie( $id_sous_categorie ) {
        $this->id_sous_categorie = $id_sous_categorie;
    }

    public function setReference( $reference ) {
        if ( strlen( $reference ) < 3 ) 
            throw new Exception ("Réference trop courte (< 4)");
        else if ( strlen( $reference ) > 31 )
            throw new Exception ("Réference trop longue (> 63)");            

        $this->reference = $reference;
    }

    public function setStock( $stock ) {
        $stock = floatval( $stock );            

        $this->stock = $stock;
    }

    public function setPrixHt( $prix_ht ) {
        $prix_ht = floatval( $prix_ht );

        $this->prix_ht = $prix_ht;
    }

    public function setTva( $tva ) {
        $tva = floatval( $tva );

        $this->tva = $tva;
    }
    
    public function setDescription( $description ) {
        if ( strlen( $description ) < 3 ) 
            throw new Exception ("description trop courte (< 3)");
        else if ( strlen( $description ) > 1023 )
            throw new Exception ("description trop longue (> 1023)");            

        $this->description = $description;
    }

    public function setPhoto( $photo ) {           
        // if ( filter_var( $photo, FILTER_VALIDATE_URL ) == false ) 
        //     throw new Exception ("Ce n'est pas une URL valide");

        $this->photo = $photo;
    }

    public function setNom( $nom ) {
        if ( strlen( $nom ) < 3 ) 
            throw new Exception ("Nom trop court (< 3)");
        else if ( strlen( $nom ) > 31 )
            throw new Exception ("Nom trop long (> 31)"); 

        $this->nom = $nom;
    }

    public function setPoids( $poids ) {
        $poids = floatval( $poids );

        $this->poids = $poids;
    }
    
    public function setActif( $actif ) {
        $this->actif = $actif;
    }

    public function checked( $checked, $current ) {
        if ( $checked == $current ) return 'checked';
            else return '';
    }
    
}

?>