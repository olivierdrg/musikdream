<?php
// models/PanierManager.class.php

class PanierManager
{
    private $link;

    // Liste des fonctions magiques en php : http://php.net/manual/fr/language.oop5.magic.php
    public function __construct( $link ) {
        $this->link = $link;
    }

    public function findAll() {
        $list = [];
        $request = "SELECT * FROM panier";
        $res = mysqli_query( $this->link, $request );
        while ($panier = mysqli_fetch_object( $res, "Panier" , [$this->link]) )
            $list[] = $panier;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = "SELECT * FROM panier WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" , [$this->link]);
        return $panier;
    }

    public function findByIdUtilisateur( $id_utilisateur ) {
        $id_utilisateur = intval( $id_utilisateur );
        $request = "SELECT * FROM panier WHERE id_utilisateur = " . $id_utilisateur;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" , [$this->link]);
        return $panier;
    }
    public function findByUtilisateur(Utilisateur $utilisateur ) {
        $id_utilisateur = intval( $utilisateur->getId() );
        $request = "SELECT * FROM panier WHERE id_utilisateur = " . $id_utilisateur;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" , [$this->link]);
        return $panier;
    }

    public function findByStatus( $status ) {
        $status = intval( $status );
        $request = "SELECT * FROM panier WHERE status = " . $status;
        $res = mysqli_query( $this->link, $request );
        $panier = mysqli_fetch_object( $res, "Panier" , [$this->link]);
        return $panier;
    }

    public function getById( $id ) {
        return $this->findById( $id );
    }

    public function getCurrent() {
        $id = $_SESSION['id'];
        $request = 'SELECT * FROM panier WHERE id_utilisateur = ' . $id . ' AND status = 0';
        $res = mysqli_query( $this->link, $request );

        if ( mysqli_num_rows( $res )  == 0 ) {
            $this->create( $id );
        } else {
            $panier = mysqli_fetch_object( $res, "Panier", [$this->link] );

            return $panier;
        }
    }

    public function create( $id_utilisateur ) {

        $panier = new Panier( $this->link );

        $panier->setIdUtilisateur( $id_utilisateur );

        $request = "INSERT INTO panier (id_utilisateur) VALUES( '" . $id_utilisateur . "')";

        $res = mysqli_query( $this->link, $request );

        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );

            // si c'est bon id > 0
            if ( $id ) {
                $panier = $this->findById( $id );
                return $panier;
            }
            else// Sinon
                throw new Exception ("Internal server error");
        }
        else// Sinon
            throw new Exception ("Internal server error");

    }

    public function update( Panier $panier ) { // hinting
        $id = $panier->getId();

        if ( $id ) {
            $produit    = 0;
            $prix       = 0;
            $poids      = 0;

            $i          = 0;
            $produits   = $panier->getProduits();
            $count      = count( $produits );

            while( $i < $count ) {
                $produit = $produits[$i];

                $prix       += $produit->getPrixHt();
                $quantite   += 1;//$produit->getQuantite();
                $poids      += $produit->getPoids();

                $i++;
            }

            // table panier
            $request = "UPDATE panier SET prix='" . $prix . "', quantite='" . $quantite . "', poids='" . $poids . "' WHERE id=" . $id;

            $res = mysqli_query( $this->link, $request );
            if ( $res ) {
                // Remove all 'produit' from 'liaison_panier_produit' table.
                $request = "DELETE FROM liaison_panier_produit WHERE liaison_panier_produit.id_panier = " . $id;
                $res = mysqli_query( $this->link, $request );

                $i = 0;

                $count = count( $produits );

                while ($i < $count) {
                    $produit = $produits[$i];

                    $request = "INSERT liaison_panier_produit ( id_panier, id_produit ) VALUES('" . $id . "','" . $produit->getId() . "')";
                    $res = mysqli_query( $this->link, $request );

                    $i++;
                }

                return $this->findById( $id );
            }
            else
                throw new Exception ("Internal server error");
        }
    }

    public function remove(Panier $panier ) {
        $id = $panier->getId();

        if ( $id ) {// tdate si > 0

            $request = "DELETE FROM panier WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $panier; // ou tdate
            else
                throw new Exception ("Internal server error");
        }
    }
}

//     public function updateLiaisonQuantite(Panier $panier ){
//         $id = $panier->getId();
//         if ( $id ) {// tdate si > 0
//             // $quantite = 0;

// idPanier
// quantite_produit

            



//         }        
//     }


?>
