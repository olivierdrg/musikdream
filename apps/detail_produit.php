<?php
    if ( isset( $_GET['id_produit'] ) ) {
        $id_produit =  intval( $_GET['id_produit'] );
        $manager = new ProduitManager( $link );
        $produit = $manager->findById( $id_produit );

        if( $produit == null ) {
            $produit = $manager->findFirst();
        } 

        require('views/detail_produit.phtml');
    }    
    
?>