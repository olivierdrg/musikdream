<?php

    $manager = new SousCategorieManager( $link );

    $sous_categories = $manager->findByCategory($categorie->getId());

    $j = 0;
    $countSousCateg = count( $sous_categories );
    while ( $j < $countSousCateg ) {
        $sous_categorie = $sous_categories[$j];
        
        require('views/admin_souscategorie.phtml');

        $j++;
    }
?>