<?php

	$i = 0;
	$count = count( $produits );
    while ( $i < $count ) {
    	$produit = $produits[$i];
    	
        require('views/admin_produit.phtml');

        $i++;
    }		
		
	
?>