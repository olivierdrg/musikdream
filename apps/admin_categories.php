<?php
	$manager = new CategorieManager( $link );

	$categorie = $manager->findAll();

	$i = 0;
	$count = count( $categorie );
    while ( $i < $count ) {
    	$produit = $categorie[$i];
    	
        require('views/admin_categories.phtml');

        $i++;
    }			
	
?>