<?php
    if ( isset( $_GET['id_produit'] ) ) {

        $manager = new ProduitManager( $link );
        $produit = $manager->findById( $_GET['id_produit'] );
    	$avisliste = $produit->getAvisListe();
        
        require('views/avisliste.phtml');
    }
    
?>