<?php
    if ( isset($_SESSION['id'])) {
        $manager = new UtilisateurManager( $link );// $link => $this->link
        try {
            $utilisateur = $manager->getById( $_SESSION['id'] );
        }
        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
    }
	require('views/profil.phtml');
?>