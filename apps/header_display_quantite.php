<?php
    $panier_manager = new PanierManager( $link );
    $panier = $panier_manager->getCurrent();

    $s = '';
    if ( $panier->getQuantite() > 1 ) $s = 's';
    
    require('views/header_display_quantite.phtml');
?>