<?php
    $manager = new CategorieManager( $link );

    $list = $manager->findAll();

    $i = 0;
    $count = sizeof( $list );

    while ( $i < $count ) {
        $categorie = $list[$i];
        $current = '';
        
        if ( isset( $sous_categorie ) ) $current = $sous_categorie->getIdCategorie();
        require('views/select_categorie.phtml');
        
        $i++;
    } 

?>