<?php
	if ( isset( $_SESSION['login'] ) )

	$manager = new CategorieManager( $link );

	$categories = $manager->findAll();

	$i = 0;
	$count = count( $categories );
	while ( $i < $count ) {
		$categorie = $categories[$i];
		
	    require('views/admin_categories.phtml');

	    $i++;
	}
?>