<?php

if ( isset( $_GET['id_categorie'] ) ) {
    $manager = new CategorieManager( $link );
    $categorie = $manager->findById( $_GET['id_categorie'] );
    $sous_categories = $categorie->getSousCategories();
    require('views/souscategories.phtml');
}
    
?>