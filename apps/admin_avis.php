<?php
	$manager = new AvisManager($link);
	$avisliste = $manager->findAll();
	// var_dump ($avisliste);
	$i = 0;
	$count = count( $avisliste );
    while ( $i < $count ) {
    	$avis = $avisliste[$i];
    	require('views/admin_avis.phtml');
    	$i++;
	}
?>