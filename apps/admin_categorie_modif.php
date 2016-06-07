<?php

    if ( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
    
        $manager = new CategorieManager( $link );

        $categorie = $manager->findById( $id );

        require('views/admin_categorie_modif.phtml');
    }
    
?>