<?php
    $i = 0;
    $count = count( $sous_categories );
    while ( $i < $count ) {
        $sous_categorie = $sous_categories[$i];
        //var_dump( $sous_categorie );
        require('views/souscategorie.phtml');

        $i++;
    }

    
?>