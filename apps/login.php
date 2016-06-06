<?php
    if ( !isset( $_SESSION['login'] ) ) {
        $error = 'Vous devez être connecté';
    }
    
    $login      = '';    

    if ( isset( $_POST['login'] ) ) $login = $_POST['login']; 

    require('views/login.phtml');
?>