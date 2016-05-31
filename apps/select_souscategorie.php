<?php
    $manager = new SousCategorieManager( $link );

    $list = $manager->findAll();

    $i = 0;
    $count = sizeof( $list );

    while ( $i < $count ) {
        $sous_categorie = $list[$i];
        $current = '';

        if ( isset( $produit ) ) $current = $produit->getIdSousCategorie();
        require('views/select_souscategorie.phtml');

        $i++;
    } 

?>