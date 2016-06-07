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

    if ( $_POST['action'] == 'upload' ) {
        // if ( isset( $_POST['id'] ) ) {

            $target_dir = "public/images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            // if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $error = "File is not an image.";
                    $uploadOk = 0;
                }
            // }
            // Check if file already exists
            if (file_exists($target_file)) {
                $error = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $error = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            }
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $error = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }



        // }
    }
}

?>