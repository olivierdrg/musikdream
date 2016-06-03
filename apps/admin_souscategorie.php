<?php

    $j = 0;
    $countSousCateg = count( $sous_categories );
    while ( $j < $countSousCateg ) {
        $sous_categorie = $sous_categories[$j];
        
        require('views/admin_souscategorie.phtml');

        $j++;
    }
?>