<?php
	$manager = new SousCategorieManager( $link );

	$sous_categories = $manager->findAll();

	$j = 0;
	$count = count( $sous_categories );
    while ( $j < $count ) {
    	$sous_categorie = $sous_categories[$j];
    	
        require('apps/admin_souscategories.phtml');

        $j++;
    }
?>