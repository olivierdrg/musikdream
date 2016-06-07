<?php
	if ( isset( $_SESSION['login'] ) ) {

        $type = 0;
        
        if ( isset( $_GET['type'] ) ) {
            $type = intval( $_GET['type'] );
        }

		$panier_manager = new PanierManager( $link );
        

		$paniers = $panier_manager->findByStatus( $type );

		require('views/admin_commandes.phtml');
	}
?>