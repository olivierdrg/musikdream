<?php

if (isset( $_SESSION['login']) ) {

    if (isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1) {
        $manager = new SousCategorieManager( $link );
        try {
            $sous_categorie = $manager->create( $_POST );//l'admin peut créer une sous-catégorie

            header('Location: index.php?page=admin_liste_sous_categorie');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if (isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1) {
        $manager = new SousCategorieManager( $link );
        try {
            $sous_categorie = $manager->update( $_POST );//l'admin peut modifier une sous-catégorie

            header('Location: index.php?page=admin_liste_sous_categorie');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if (isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1) {
        $manager = new SousCategorieManager( $link );
        try {
            $sous_categorie = $manager->remove( $_POST );//l'admin peut supprimer une sous-catégorie

            header('Location: index.php?page=admin_liste_sous_categorie');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

}

?>