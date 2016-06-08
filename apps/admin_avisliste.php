<?php
        $manager = new AvisManager( $link );
        $admin_avisliste = $manager->findAll();
        
	$i = 0;
	$count = count( $admin_avisliste );
    while ( $i < $count ) {
    	$avis = $admin_avisliste[$i];

        require('views/admin_avisliste.phtml');
    	$i++;
	}
?>