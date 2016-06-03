<?php
    $manager = new CategorieManager( $link );

    $categories = $manager->findAll();
    require('views/categories.phtml');
?>