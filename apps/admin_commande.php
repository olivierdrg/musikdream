<?php

	$i = 0;
	$count = count( $paniers );
    while ( $i < $count ) {
    	$panier = $paniers[$i];
        
        require('views/admin_commande.phtml');

        $i++;
    }		
		
	
?>