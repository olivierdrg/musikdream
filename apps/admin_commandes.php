<?php
	if ( isset( $_SESSION['login'] ) ) {

        $status = 0;
        
        if ( isset( $_GET['status'] ) ) {
            $status = intval( $_GET['status'] );
        }

		$panier_manager = new PanierManager( $link );
        

		$paniers = $panier_manager->findByStatus( $status );

		require('views/admin_commandes.phtml');
	}
?>