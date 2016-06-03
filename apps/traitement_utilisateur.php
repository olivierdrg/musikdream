<?php
        // var_dump($_POST['action']);
        // var_dump($_POST);


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
        // var_dump($_POST);
        // -----------------------------------------------
        // traitement de l'utilisateur
        // -----------------------------------------------
        $manager = new UtilisateurManager( $link );// $link => $this->link
        try {
            // chercher la feuille utilisateur à modifier
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

        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        // -----------------------------------------------
        // traitement de l'adresse de facturation
        // -----------------------------------------------
        $manager = new AdresseManager($link);
        try {

            // chercher la feuille adresse à modifier
            // $adresse = $manager->findFacturationByUser( $_SESSION['id'] );
            $adresse = $manager->findFacturationByUser( $utilisateur );


            // ici les setter pour modifier les données de la feuille
            $adresse -> setDesignation($_POST['designation']);
            $adresse -> setRue($_POST['rue']);
            $adresse -> setCp($_POST['cp']);
            $adresse -> setVille($_POST['ville']);
            $adresse -> setPays($_POST['pays']);
            $adresse -> setTypeAdresse('0');

            // sauvegarder adresse, replacer la feuille à son endroit et retour à la home
            $manager -> update($adresse);
            // header('Location: index.php?page=home');
            // exit;
        }

        catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        // -----------------------------------------------
        // traitement de l'adresse de livraison
        // -----------------------------------------------
        $manager = new AdresseManager($link);
        try {
            // chercher la feuille adresse à modifier
            $adresse = $manager->findLivraisonByUser( $utilisateur );

            if(isset($_POST['typeIdem']) && $_POST['typeIdem'] == 'idem'){
                // ici les setter pour modifier les données de la feuille adresse de facturation
                $adresse -> setDesignation($_POST['designation']);
                $adresse -> setRue($_POST['rue']);
                $adresse -> setCp($_POST['cp']);
                $adresse -> setVille($_POST['ville']);
                $adresse -> setPays($_POST['pays']);
                $adresse -> setTypeAdresse('1');
            }
            else{
                // ici les setter pour modifier les données de la feuille adresse de livraison
                $adresse -> setDesignation($_POST['designation1']);
                $adresse -> setRue($_POST['rue1']);
                $adresse -> setCp($_POST['cp1']);
                $adresse -> setVille($_POST['ville1']);
                $adresse -> setPays($_POST['pays1']);
                $adresse -> setTypeAdresse('1');
            }

            // sauvegarder adresse, replacer la feuille à son endroit et retour à la page home
            $manager -> update($adresse);
            // header('Location: index.php?page=profil');
            // exit;
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