<?php
    if ( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
    
        $manager = new ProduitManager( $link );

        $produit = $manager->findById( $id );

        require('views/admin_produit_modif.phtml');
    }
    
?>