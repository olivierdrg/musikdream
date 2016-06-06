<?php
$avisliste = $produit->getAvis();
	$i = 0;
	$count = count( $avisliste );
    while ( $i < $count ) {
    	$avis = $admin_avisliste[$i];
        require('views/avis.phtml');
    	$i++;
	}
?>