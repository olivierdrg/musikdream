<?php
    if ( isset( $_SESSION['login'] ) )
    {
    	$sous_categories = $categorie->getSousCategories();
	    // $manager = new SousCategorieManager( $link );
	    // $sous_categories = $manager->findByCategory($categorie->getId());
	    require('views/admin_souscategories.phtml');
	}
?>