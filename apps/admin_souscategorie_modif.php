<?php

    if ( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
    
        $manager = new SousCategorieManager( $link );

        $sous_categorie = $manager->findById( $id );

        require('views/admin_souscategorie_modif.phtml');
    }
    
?>