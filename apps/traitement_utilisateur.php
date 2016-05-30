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



    if ( $_POST['action'] == 'update' ) {
        var_dump($_POST);
        $manager = new UtilisateurManager( $link );// $link => $this->link
        try {
            // chercher la feuille à modifier
            $utilisateur = $manager->getById( $_SESSION['id'] );
            // ici les setter pour modifier les données de la feuille
            $utilisateur -> setNom($_POST['nom']);
            $utilisateur -> setPrenom($_POST['prenom']);
            $utilisateur -> setEmail($_POST['email']);
            $utilisateur -> setDateNaissance($_POST['date_naissance']);
            $utilisateur -> setTelephone($_POST['telephone']);
            $utilisateur -> setSexe($_POST['sexe']);

            // sauvegarder utilisateur, replacer la feuille à son endroit
            $manager -> update($utilisateur);
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