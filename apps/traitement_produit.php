<?php
if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'ajout') {

        $manager = new ProduitManager( $link );// $link => $this->link
        try {
            $produit = $manager->create( $_POST );

            header('Location: index.php?page=admin_liste_produit');
            exit;
        }

        catch ( Exception $exception ){
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'modif' ) {
        $manager = new ProduitManager( $link );// $link => $this->link
        try {
            $produit = $manager->login( $_POST );

            header('Location: index.php?page=admin_list_produit');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'supp' ) {

    }    

    if ( $_POST['action'] == 'cacher' ) {

    }       
}
?>