<?php
    $id_sous_categorie  = '';
    $reference          = '';
    $stock              = '';
    $prix_ht            = '';
    $tva                = '';
    $description        = '';
    $photo              = '';
    $nom                = '';
    $poids              = '';
    $actif              = '';

    if ( isset( $_POST['id_sous_categorie'] ) ) $id_sous_categorie = $_POST['id_sous_categorie'];
    if ( isset( $_POST['reference'] ) ) $reference = $_POST['reference'];   
    if ( isset( $_POST['stock'] ) ) $stock = $_POST['stock']; 
    if ( isset( $_POST['prix_ht'] ) ) $prix_ht = $_POST['prix_ht']; 
    if ( isset( $_POST['tva'] ) ) $tva = $_POST['tva']; 
    if ( isset( $_POST['description'] ) ) $description = $_POST['description']; 
    if ( isset( $_POST['photo'] ) ) $photo = $_POST['photo']; 
    if ( isset( $_POST['nom'] ) ) $nom = $_POST['nom'];
    if ( isset( $_POST['poids'] ) ) $poids = $_POST['poids'];  
    if ( isset( $_POST['actif'] ) ) $actif = $_POST['actif'];  

    require('views/admin_produit_modif.phtml');
?>