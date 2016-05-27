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

    //...

    // Getter/Setter | Accesseur/Mutateur | Accessor/Mutator

    public function getId() {
        return $this->id;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getDesignation() {
        return $this->date;
    }
    public function getRue() {
        return $this->status;
    }

    public function getCp() {
        return $this->prix;
    }

    public function getVille() {
        return $this->quantite;
    }

    public function getPays() {
        return $this->poids;
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