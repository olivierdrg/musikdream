<?php
if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'register') {

        $manager = new UtilisateurManager( $link );// $link => $this->link
        try {
            $utilisateur = $manager->create( $_POST );

            header('Location: index.php?page=login');
            exit;
        }

        catch ( Exception $exception ){
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'login' ) {
        $manager = new UtilisateurManager( $link );// $link => $this->link
        try {
            $utilisateur = $manager->login( $_POST );

            header('Location: index.php?page=home');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }

}

if ( $_GET['page'] == 'logout' ) {
    session_destroy();

    header('Location: index.php?page=home');
    exit;        
}  
?>