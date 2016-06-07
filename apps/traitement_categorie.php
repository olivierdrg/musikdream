<?php

if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'ajout')  {

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

    if ( $_POST['action'] == 'modif' ) {

        $manager = new CategorieManager( $link );
        try {
            $id =  $_POST['id'];
            $categorie = $manager->findById( $id );

            $categorie->setPhoto( $_POST['photo'] );
            $categorie->setNom( $_POST['nom'] );
            $categorie->setDescription( $_POST['description'] );

            $categorie = $manager->update( $categorie );//l'admin peut modifier une catégorie

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
            $manager = new CategorieManager( $link );
            $id =  $_POST['id'];
            $categorie = $manager->findById( $id );
            $manager->remove( $categorie );//l'admin peut supprimer une catégorie

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