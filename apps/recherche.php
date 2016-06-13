<?php
    $i = 0;
    $count = count( $list_search );

    while ( $i < $count ) {
        $produit = $list_search[$i];
        
        require('views/recherche.phtml');

        $i++;
    }  
?>