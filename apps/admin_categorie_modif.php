<?php

	$manager = new CategorieManager( $link );
    $categorie = $manager->findAll();
	require('views/admin_categorie_modif.phtml');
?>