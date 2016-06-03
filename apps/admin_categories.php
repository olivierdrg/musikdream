<?php
	if ( isset( $_SESSION['login'] ) )
	{
		$manager = new CategorieManager( $link );
		$categories = $manager->findAll();
		require('views/admin_categories.phtml');
	}
?>