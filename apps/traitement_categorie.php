<?php

if (isset( $_SESSION['login']) ) {

    if (isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1) {
        $manager = new CategorieManager( $link );
        try {
            $categorie = $manager->create( $_POST );//l'admin peut créer une catégorie

            header('Location: index.php?page=admin_categories');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if (isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1) {
        $manager = new CategorieManager( $link );
        try {
            $categorie = $manager->update( $_POST );//l'admin peut modifier une catégorie

            header('Location: index.php?page=admin_categories');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if (isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1) {
        $manager = new CategorieManager( $link );
        try {
            $categorie = $manager->remove( $_POST );//l'admin peut supprimer une catégorie

            header('Location: index.php?page=admin_categories');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

}

?>