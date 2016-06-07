<?php

if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'ajout')  {

        $manager = new SousCategorieManager( $link );
        try {
            $sous_categorie = $manager->create( $_POST );//l'admin peut créer une catégorie

            header('Location: index.php?page=admin_categories');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'modif' ) {

        $manager = new SousCategorieManager( $link );
        try {
            $id =  $_POST['id'];
            $sous_categorie = $manager->findById( $id );

            $sous_categorie->setPhoto( $_POST['photo'] );
            $sous_categorie->setNom( $_POST['nom'] );
            $sous_categorie->setDescription( $_POST['description'] );

            $sous_categorie = $manager->update( $sous_categorie );//l'admin peut modifier une catégorie

            header('Location: index.php?page=admin_categories');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'supp' ) {
        if ( isset( $_POST['id'] ) ) {

        try {
            $manager = new SousCategorieManager( $link );
            $sous_categorie = $manager->findById( $id );
            $manager->remove( $sous_categorie );//l'admin peut supprimer une catégorie

            header('Location: index.php?page=admin_categories');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
        }
    }
}

?>