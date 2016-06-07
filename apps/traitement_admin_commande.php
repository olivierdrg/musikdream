<?php
    if ( !isset( $_SESSION['login'] ) ) {
        header('Location: index.php?page=login');
        exit;
    }

    if ( isset( $_GET['action'] ) && $_GET['action'] == 'valide' ) {
        if ( isset( $_GET['id'] ) ) {
            $id = intval( $_GET['id'] );
            $panier_manager = new PanierManager( $link );

            $panier = $panier_manager->findById( $id );
            $panier->setStatus(2);
            $panier_manager->update( $panier );
            
            header('Location: index.php?page=admin_commandes');
            exit;  
        }
    }
?>