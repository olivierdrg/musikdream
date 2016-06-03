<?php
	if ( isset( $_SESSION['login'] ) )
	{
		$manager = new ProduitManager( $link );

		$produits = $manager->findAll();
		require('views/admin_produits.phtml');
	}
?>