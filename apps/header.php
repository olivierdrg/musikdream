<?php

if ( isset($_SESSION['login']) ) {

	$panier_manager = new PanierManager( $link );
	$panier = $panier_manager->getCurrent();

    $s = '';
    if ( $panier->getQuantite() > 1 ) $s = 's';

	if ( isset( $_SESSION['admin'] ) && $_SESSION['admin'] == 1 )
		require('views/header_admin.phtml');
	else
		require('views/header_utilisateur.phtml');
} else
    require('views/header.phtml');
?>