<?php    
    session_start();
    require('config.php');

    function __autoload( $className ) {
        require('models/' . $className . '.class.php' );
    }

    $link = mysqli_connect( $serveur ,$username, $password, $database);
    if ( !$link ) {
        require('views/bigerror.phtml');
        exit;
    }

    define( 'LIB', 'public/' );
    define( 'IMAGE_PATH', LIB . 'images/' );
    define( 'CSS_PATH', LIB . 'css/' );
    define( 'JS_PATH', LIB . 'js/' );
    

    $page = 'home';
    $error = '';

    $access = array(
        'login',
        'logout',
        'register',
        'admin',
    );

    $access_traitement = array(      
        'login'     =>'utilisateur',
        'logout'    =>'utilisateur',
        'register'  =>'utilisateur',
        'admin'     =>'admin',
    );

    if ( isset( $_GET['page'] ) ) {
        if ( in_array( $_GET['page'], $access ) ) {
            $page = $_GET['page'];
        }
    }

    if ( isset($access_traitement[$page]) ) {
        require("apps/traitement_" . $access_traitement[$page] . ".php");
    }

    require('apps/skel.php');

?>