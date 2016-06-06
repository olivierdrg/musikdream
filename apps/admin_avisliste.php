<?php
        $manager = new AvisManager( $link );
        $avisliste = $manager->findAll();
        
	$i = 0;
	$count = count( $avisliste );
    while ( $i < $count ) {
    	$avis = $avisliste[$i];
        require('views/avis.phtml');
    	$i++;
	}
?>