<?php
    if ( isset( $_POST['id'] ) )
        $id = $_POST['id'];
    else
        $id = '';

    if ( isset( $_POST['id_categorie'] ) )
        $id_categorie = $_POST['id_categorie'];
    else
        $id_categorie = '';

    if ( isset( $_POST['nom'] ) )
        $nom = $_POST['nom'];
    else
        $nom = '';

    if ( isset( $_POST['description'] ) )
        $description = $_POST['description'];
    else
        $description = '';

    if ( isset( $_POST['photo'] ) ){
        $photo = $_POST['photo'];
        $url_image = $photo; 
        $nom_photo = $photo;
    }
    else{
        $photo = '';
        $url_image = ''; 
        $nom_photo = '';
    }

    if ( isset( $_FILES["fileToUpload"]["name"] ) ){
        $url_image = 'public/images/'.$_FILES["fileToUpload"]["name"];
        $nom_photo = $_FILES["fileToUpload"]["name"];
    }

    require('views/admin_souscategorie_ajout.phtml');
?>