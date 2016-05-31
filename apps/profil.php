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
    $sexe = [
                '0' => ['checked',''],
                '1' => ['','checked']
             ];
	require('views/profil.phtml');
?>