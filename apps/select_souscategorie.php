<?php
    $manager = new SousCategorieManager( $link );

    $list = $manager->findAll();

    $i = 0;
    $count = sizeof( $list );

    while ( $i < $count ) {
        $sous_categorie = $list[$i];
        require('views/select_souscategorie.phtml');
        $i++;
    } 

?>