<?php
	$manager = new ProduitManager( $link );

	$list_produit = $manager->findAll();

	$i = 0;
	$count = count( $list_produit );
    while ( $i < $count ) {
    	$produit = $list_produit[$i];
    	
        require('views/admin_produit.phtml');

        $i++;
    }		
		
	
?>