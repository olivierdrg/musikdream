<?php
    if ( $produit->getStock() > 0 ) 
        require('views/detail_produit_button.phtml');
    else 
        require('views/detail_produit_nostock.phtml');
?>