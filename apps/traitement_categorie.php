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
            $a=1/0;
            try {
                $manager = new CategorieManager( $link );
                $id =  $_POST['id'];
                // var_dump($id);
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

    if ( $_POST['action'] == 'upload' && $_FILES["fileToUpload"]["name"]) {

        $target_dir = "public/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error = "Ce fichier n'est pas une image valide.";
                $uploadOk = 0;
            }
        // Check if file already exists
        if (file_exists($target_file)) {
            $error = "Une image avec le même nom existe déjà sur le serveur et sera utilisée.";
            $uploadOk = 0;
        }
        else{
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $error = "Taille de l'image trop grande ( > 500000).";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error = "Uniquement des images de type JPG, JPEG, PNG & GIF.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = "Erreur interne0.";
            // if everything is ok, try to upload file
            }
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $error = "L'image ". basename( $_FILES["fileToUpload"]["name"]). " a été correctement uploadée.";
                } else {
                    $error = "Erreur interne1.";
                }
            }
        }
    }

    if ( $_POST['action'] == 'supp_souscategorie' ) {
        if ( isset( $_POST['id'] ) ) {
            try {
                $manager = new SousCategorieManager( $link );
                $id =  $_POST['id'];
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