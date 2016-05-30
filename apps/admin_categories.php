<?php
	$manager = new CategorieManager( $link );

	$categorie = $manager->findAll();

	$i = 0;
	$count = count( $categorie );
    while ( $i < $count ) {
    	$produit = $categorie[$i];
    	
        require('views/admin_categories.phtml');

        $i++;

        $j = 0;
		$count = count( $sous_categorie );
	    while ( $j < $count ) {
	    	$produit = $sous_categorie[$j];
	    	
	        require('apps/admin_souscategories.php');

	        $j++;
	    }
    }			
	
?>