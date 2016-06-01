<?php
    $manager = new ProduitManager( $link );

    $produits = $manager->findBySousCategorie( $sous_categorie );

    $i = 0;
    $count = count( $produits );

    while ( $i < $count ) {
        $produit = $produits[$i];
        
        require('views/produit.phtml');

        $i++;
    }

    
?>