<?php

    $i = 0;
    $count = count( $categories );
    while ( $i < $count ) {
        $categorie = $categories[$i];
        
        require('views/categorie.phtml');

        $i++;
    }

    
?>