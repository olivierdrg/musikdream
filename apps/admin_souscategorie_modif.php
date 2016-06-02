<?php

    $manager = new SousCategorieManager( $link );
    try {
            $sous_categorie = $manager->findAll();
        }
        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
        
    require('views/admin_souscategorie_modif.phtml');
?>