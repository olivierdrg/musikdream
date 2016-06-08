<?php
$avisliste = $produit->getAvis();
	$i = 0;
	$count = count( $avisliste );
    while ( $i < $count ) {
    	$avis = $avisliste[$i];

        require('views/avisliste.phtml');
    	$i++;
	}
?>