<?php
    if ( isset( $_SESSION['login'] ) ) {
        if ( isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1 ) {
    		$manager = new ProduitManager( $link );

    		$produits = $manager->findAll();
    		require('views/admin_produits.phtml');
    	}
    }
?>