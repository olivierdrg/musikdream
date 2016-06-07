<?php
/**
* @file : Utilisateur.class.php // PascalCase
*
*/
class Adresse {
    // Déclaration des propriétés privées.
    private $id;
    private $id_utilisateur;
    private $designation;
    private $rue;
    private $cp;
    private $ville;
    private $pays;
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
            return $this->designation;
    }

    public function getRue() {
        return $this->rue;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getPays() {
        return $this->pays;
    }

    public function getType() {
        return $this->type;
    }


    public function setDesignation( $designation ) {
        if ( strlen( $designation ) > 63 )
            throw new Exception ("designation trop longe (> 63)");            

        $this->designation = $designation;
    }

    public function setRue( $rue ) {
        if ( strlen( $rue ) < 3 ) 
            throw new Exception ("Nom de rue trop court (< 4)");
        else if ( strlen( $rue ) > 63 )
            throw new Exception ("Nom de rue trop long (> 63)");            

        $this->rue = $rue;
    }

    public function setCp( $cp ) {
        if ( strlen( $cp ) != 5 )
            throw new Exception ("Code postal invalide");

        $this->cp = $cp;
    }

    public function setVille( $ville ) {
        if ( strlen( $ville ) < 3 ) 
            throw new Exception ("Nom de ville trop court (< 4)");
        else if ( strlen( $ville ) > 63 )
            throw new Exception ("Nom de ville trop long (> 63)");            

        $this->ville = $ville;
    }
    
    public function setPays( $pays ) {     
        if ( strlen( $pays ) > 63 )
            throw new Exception ("Nom de pays trop long (> 63)");  

        $this->pays = $pays;
    }

    public function setTypeAdresse( $type ) {
        $this->type = $type;
    }
}

?>