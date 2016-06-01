<?php
/**
* @file : Panier.class.php // PascalCase
*
*/
class Panier {
    // Déclaration des propriétés privées.
    private $id;
    private $id_utilisateur;
    private $date;
    private $status;
    private $prix;
    private $quantite;
    private $poids;
    private $type;

    private $produits;// pas stocké directement dans la db -> calculé et par défaut == NULL

    private $link;// propriété extérieure != DB

    //...

    public function __construct($link)
    {
        $this->link = $link;
    }
    // Getter/Setter | Accesseur/Mutateur | Accessor/Mutator
    public function getProduits()
    {
        // $this->produits => null
        if ($this->produits === null)
        {
            $manager = new ProduitManager($this->link);
            $this->produits = $manager->findByPanier($this);
        }
        return $this->produits;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getDate() {
        return $this->date;
    }
    public function getStatus() {
        return $this->status;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getPoids() {
        return $this->poids;
    }

    // $this->produits => array
    public function addProduit(Produit $produit)
    {
        if ($this->produits === null)
            $this->getProduits();
        $this->produits[] = $produits;
    }
    public function removeProduit(Produit $produit)
    {
        if ($this->produits === null)
            $this->getProduits();
        $count = 0;
        $max = sizeof($this->produits);
        while ($count < $max)
        {
            if ($this->produits[$count]->getId() == $produit->getId())
            {
                // supprimer $this->produits[$count]
            }
            $count++;
        }
    }
    public function setDate( $date ) {
        // if ( strlen( $date ) < 3 ) 
        //     throw new Exception ("Date trop courte (< 4)");
        // else if ( strlen( $date ) > 63 )
        //     throw new Exception ("Date trop longe (> 63)");            

        $this->date = $date;
    }

    public function setStatus( $status ) {
        if ( strlen( $status ) < 3 ) 
            throw new Exception ("Nom de status trop court (< 4)");
        else if ( strlen( $status ) > 63 )
            throw new Exception ("Nom de status trop long (> 63)");            

        $this->status = $status;
    }

    public function setPrix( $prix ) {
        floatval($prix);
        $this->prix = $prix;
    }

    public function setQuantite( $quantite ) {
        if ( strlen( $quantite ) < 1 ) 
            throw new Exception ("Quantite = 0 ???");
        else if ( strlen( $quantite ) > 50 )
            throw new Exception ("Quantite trop grande (> 50)");            

        $this->quantite = $quantite;
    }
    
    public function setPoids( $poids ) { 
        floatval($poids);
        $this->poids = $poids;
    }
}
?>