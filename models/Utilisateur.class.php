<?php
/**
* @file : Utilisateur.class.php // PascalCase
*
*/
class Utilisateur {
    // Déclaration des propriétés privées.
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mot_passe;
    private $date_inscription;
    private $admin;
    private $date_naissance;
    private $telephone;
    private $sexe;
    private $actif;
    private $login;

    private $adresseFacturation;
    private $adresseLivraison;
    private $panier;

    private $link;// propriété extérieure != DB

    //...

    public function __construct($link)
    {
        $this->link = $link;
    }

    // Getter/Setter | Accesseur/Mutateur | Accessor/Mutator

    // public function getAdresseFacturation() {
    //     return $this->adresseFacturation;
    // }

    public function getPanier()
    {
        if ($this->panier === null)
        {
            $manager = new PanierManager($this->link);
            $this->panier = $manager->findByUtilisateur($this);
        }
        return $this->panier;
    }
    public function getAdresseFacturation()
    {
        // $this->produits => null
        if ($this->adresseFacturation === null)
        {
            $manager = new AdresseManager($this->link);
            $this->adresseFacturation = $manager->findFacturationByUser($this);
        }
        return $this->adresseFacturation;
    }

    public function getAdresseLivraison()
    {
        // $this->produits => null
        if ($this->adresseLivraison === null)
        {
            $manager = new AdresseManager($this->link);
            $this->adresseLivraison = $manager->findLivraisonByUser($this);
        }
        return $this->adresseLivraison;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }
    public function getEmail() {
        return $this->email;
    }

    public function getMotPasse() {
        return $this->mot_passe;
    }

    public function getDateInscription() {
        return $this->date_inscription;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function getDateNaissance() {
        return $this->date_naissance;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getActif() {
        return $this->actif;
    }

    public function getLogin() {
        return $this->login;
    }
    


    // public function getAdresses() {
    //     return $this->;
    
    public function setNom( $nom ) {
        if ( strlen( $nom ) < 3 ) 
            throw new Exception ("Nom trop court (< 3)");
        else if ( strlen( $nom ) > 63 )
            throw new Exception ("Nom trop long (> 63)");            

        $this->nom = $nom;
    }

    public function setPrenom( $prenom ) {
        if ( strlen( $prenom ) < 3 ) 
            throw new Exception ("Prénom trop court (< 3)");
        else if ( strlen( $prenom ) > 63 )
            throw new Exception ("Prénom trop long (> 63)");            

        $this->prenom = $prenom;
    }

    public function setEmail( $email ) {
        if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) == false )
            throw new Exception ("Email invalide");

        $this->email = $email;
    }

    public function setMotPasse( $mot_passe ) {
        if ( strlen( $mot_passe ) < 3 ) 
            throw new Exception ("Mot de passe trop court (< 3)");
        else if ( strlen( $mot_passe ) > 63 )
            throw new Exception ("Mot de passe trop long (> 63)");            

        $this->mot_passe = $mot_passe;
    }
    
    public function setDateNaissance( $date_naissance ) {          
        $this->date_naissance = $date_naissance;
    }

    public function setTelephone( $telephone ) {
        if ( strlen( $telephone ) != 10 ) 
            throw new Exception ("Téléphone incorrect");
        else if ( $telephone[0] != '0' )
            throw new Exception ("Téléphone incorrect");            

        $this->telephone = $telephone;
    }

    public function setSexe( $sexe ) {
        $this->sexe = $sexe;
    }

    public function setActif( $actif ) {
        $this->actif = $actif;
    }

    public function setLogin( $login ) {
        if ( strlen( $login ) < 3 ) 
            throw new Exception ("Login trop court (< 3)");
        else if ( strlen( $login ) > 63 )
            throw new Exception ("Login trop long (> 63)");            

        $this->login = $login;
    }
    
}

?>