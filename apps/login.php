<?php    
    $login      = '';    

    if ( isset( $_POST['login'] ) ) $login = $_POST['login']; 

    require('views/login.phtml');
?>