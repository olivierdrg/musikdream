<?php
    if ( isset( $_GET['id_produit'] ) ) {

        $manager = new ProduitManager( $link );

        $produit = $manager->findById( $_GET['id_produit'] );
        
        require('views/detail_produit.phtml');
    }    
    
?>