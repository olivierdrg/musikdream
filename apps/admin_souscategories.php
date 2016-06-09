<?php
    if ( isset( $_SESSION['login'] ) )
    {
    	$sous_categories = $categorie->getSousCategories();
	    require('views/admin_souscategories.phtml');
	}
?>