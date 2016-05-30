<?php
if ( isset( $_POST['action'] ) ) {
    
    if ($_POST['action'] == 'create') {

        $manager = new AdresseManager( $link );// $link => $this->link
        try {
            $adresse = $manager->create( $_POST );

            header('Location: index.php?page=login');
            exit;
        }

        catch ( Exception $exception ){
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'update' ) {
        $manager = new AdresseManager( $link );// $link => $this->link
        try {
            $utilisateur = $manager->update( $_POST );

            header('Location: index.php?page=profil');
            exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }
}
?>