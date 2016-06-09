<?php
	if ( isset( $_SESSION['login'] ) ) {
        if ( isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1 ) {
    		$manager = new CategorieManager( $link );
    		$categories = $manager->findAll();
    		require('views/admin_categories.phtml');
    	}
    }
?>