<?php
    // panier_produit.php
    $list = $panier->getProduits();
    $count = 0;
    $max = sizeof($list);
    while ($count < $max)
    {
        $produit = $list[$count];
        require('views/panier_produit.phtml');
        $count++;
    }
?>