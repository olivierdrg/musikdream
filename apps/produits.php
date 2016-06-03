<?php
    if ( isset( $_GET['id_sous_categorie'] ) ) {

        $manager = new SousCategorieManager( $link );
        $sous_categorie = $manager->findById( $_GET['id_sous_categorie'] );
    	$produits = $sous_categorie->getProduits();
        
        require('views/produits.phtml');
    }
    
?>