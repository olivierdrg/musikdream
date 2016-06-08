<?php

    if ( isset( $_GET['id_categorie'] ) ) {
        $id_categorie = intval( $_GET['id_categorie'] );
        $manager = new CategorieManager( $link );
        $categorie = $manager->findById( $id_categorie );

        if( $categorie == null ) {
            $categorie = $manager->findFirst();
        } 

        $sous_categories = $categorie->getSousCategories();
        require('views/souscategories.phtml');    
    }
    
?>