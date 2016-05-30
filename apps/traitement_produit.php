<?php
if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'ajout') {

        $manager = new ProduitManager( $link );// $link => $this->link
        try {
            $produit = $manager->create( $_POST );

            header('Location: index.php?page=admin_produits');
            exit;
        }

        catch ( Exception $exception ){
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'modif' ) {
        $manager = new ProduitManager( $link );
        try {
            $id =  $_POST['id'];
            $produit = $manager->findById( $id );

            $produit->setIdSousCategorie( $_POST['id_sous_categorie'] );
            $produit->setReference( $_POST['reference'] );
            $produit->setStock( $_POST['stock'] );
            $produit->setPrixHt( $_POST['prix_ht'] );
            $produit->setTva( $_POST['tva'] );
            $produit->setDescription( $_POST['description'] );
            $produit->setPhoto( $_POST['photo'] );
            $produit->setNom( $_POST['nom'] );
            $produit->setPoids( $_POST['poids'] );
            $produit->setActif( $_POST['actif'] );

            $produit = $manager->update( $produit );
            header('Location: index.php?page=admin_produits');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'supp' ) {
        if ( isset( $_POST['id'] ) ) {
            try {
                $manager = new ProduitManager( $link );
                $id =  $_POST['id'];
                $produit = $manager->findById( $id );
                $manager->remove( $produit );
            }

            catch (Exception $exception) {
                $error = $exception->getMessage();
            }            
        }
    }    

    if ( $_POST['action'] == 'cacher' ) {

    }       
}
?>