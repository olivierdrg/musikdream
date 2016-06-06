<?php
    if ( !isset( $_SESSION['login'] ) ) {
        header('Location: index.php?page=login');
        exit;
    }

    if ( isset( $_POST['action'] ) ) {
        // var_dump($_POST);
        if ($_POST['action'] == 'ajout') {

            $panier_manager = new PanierManager( $link );
            $produit_manager = new ProduitManager( $link );
            try {
                $produit = $produit_manager->findById( $_POST['id'] );
                $panier = $panier_manager->getCurrent();
                $panier->addProduit( $produit );
                $panier_manager->update( $panier );

                header('Location: index.php?page=panier');
                exit;            
            }

            catch ( Exception $exception ){
                $error = $exception->getMessage();
            }        

        }
       
        if ($_POST['action'] == 'retirer') {
            // var_dump($POST);
            $panier_manager = new PanierManager( $link );
            $produit_manager = new ProduitManager( $link );
            try {
                $produit = $produit_manager->findById( $_POST['idProduit'] );
                $panier = $panier_manager->getCurrent();
                $panier_manager->removeProduitPanier($panier,  $produit );

                header('Location: index.php?page=panier');
                exit;            
            }

            catch ( Exception $exception ){
                $error = $exception->getMessage();
            }        

        }

    }
?>