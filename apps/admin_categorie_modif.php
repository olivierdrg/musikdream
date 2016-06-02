<?php

	$manager = new CategorieManager( $link );
	try {
            $categorie = $manager->findAll();
        }
        catch (Exception $exception) {
            $error = $exception->getMessage();
        }
		
	require('views/admin_categorie_modif.phtml');
?>