<?php
    $nom                = '';
    $prenom             = '';
    $email              = '';
    $mot_passe          = '';
    $confirme_mot_passe = '';
    $date_naissance     = '';
    $telephone          = '';
    $sexe               = '';
    $login              = '';

    if ( isset( $_POST['nom'] ) ) $nom = $_POST['nom'];
    if ( isset( $_POST['prenom'] ) ) $prenom = $_POST['prenom'];   
    if ( isset( $_POST['email'] ) ) $email = $_POST['email']; 
    if ( isset( $_POST['mot_passe'] ) ) $mot_passe = $_POST['mot_passe']; 
    if ( isset( $_POST['confirme_mot_passe'] ) ) $confirme_mot_passe = $_POST['confirme_mot_passe']; 
    if ( isset( $_POST['date_naissance'] ) ) $date_naissance = $_POST['date_naissance']; 
    if ( isset( $_POST['telephone'] ) ) $telephone = $_POST['telephone']; 
    if ( isset( $_POST['sexe'] ) ) $sexe = $_POST['sexe'];
    if ( isset( $_POST['login'] ) ) $login = $_POST['login'];  

    require('views/register.phtml');
?>