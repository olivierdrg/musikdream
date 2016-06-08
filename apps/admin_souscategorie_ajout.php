<?php
    $id  				= '';
    $id_categorie		= '';
    $photo              = '';
    $nom                = '';
    $description        = '';
    $url_image          = ''; 
    $nom_photo          = '';

    if ( isset( $_POST['id'] ) ) $id = $_POST['id'];
    if ( isset( $_POST['id_categorie'] ) ) $id_categorie = $_POST['id_categorie'];
    if ( isset( $_POST['photo'] ) ) $photo = $_POST['photo']; 
    if ( isset( $_POST['nom'] ) ) $nom = $_POST['nom'];
    if ( isset( $_POST['description'] ) ) $description = $_POST['description'];   
    if ( isset( $_FILES["fileToUpload"]["name"] ) ){
        $url_image = 'public/images/'.$_FILES["fileToUpload"]["name"];
        $nom_photo = $_FILES["fileToUpload"]["name"];
    }
    require('views/admin_souscategorie_ajout.phtml');
?>