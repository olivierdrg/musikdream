<?php
	$manager = new SousCategorieManager( $link );

	$sous_categorie = $manager->findAll();

	$j = 0;
	$count = count( $sous_categorie );
    while ( $j < $count ) {
    	$produit = $sous_categorie[$j];
    	
        require('apps/admin_souscategories.phtml');

        $j++;
    }
?>