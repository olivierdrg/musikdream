<?php

    $manager = new SousCategorieManager( $link );

    $sous_categories = $manager->findAll();

    $i = 0;
    $count = count( $sous_categories );
    while ( $i < $count ) {
        $sous_categorie = $sous_categories[$i];
        
        require('views/admin_souscategorie.phtml');

        $i++;
    }
?>