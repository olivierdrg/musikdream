<?php

	// var_dump ($avisliste);
	$i = 0;
	$count = count( $avisliste );
    while ( $i < $count ) {
    	$avis = $avisliste[$i];
    	require('views/avis.phtml');
    	$i++;
	}
    
?>