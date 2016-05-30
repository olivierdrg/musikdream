<?php
    $id  				= '';
    $photo              = '';
    $nom                = '';
    $description        = '';

    if ( isset( $_POST['id'] ) ) $id = $_POST['id'];
    if ( isset( $_POST['photo'] ) ) $photo = $_POST['photo']; 
    if ( isset( $_POST['nom'] ) ) $nom = $_POST['nom'];
    if ( isset( $_POST['description'] ) ) $description = $_POST['description'];   

    require('views/admin_categorie.phtml');
?>