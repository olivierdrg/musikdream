<?php
    if ( isset( $_GET['id_sous_categorie'] ) ) {
        $id_sous_categorie =  intval( $_GET['id_sous_categorie'] );
        $manager = new SousCategorieManager( $link );
        $sous_categorie = $manager->findById( $_GET['id_sous_categorie'] );
 
        if( $sous_categorie == null ) {
            $sous_categorie = $manager->findFirst();
        }        
        
        $produits = $sous_categorie->getProduits();

        require('views/produits.phtml');
    }
    
?>