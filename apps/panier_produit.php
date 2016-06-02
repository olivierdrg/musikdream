<?php
    $option_selected = [
                        '1' => ['selected','','',''],
                        '2' => ['','selected','',''],
                        '3' => ['','','selected',''],
                        '4' => ['','','','selected']
                        ];

    // panier_produit.php
    $list = $panier->getProduits();
    $count = 0;
    $max = sizeof($list);
    while ($count < $max)
    {
        $produit = $list[$count];
        $poids = number_format(($produit->getPoids()/1000), 2, '.', '');
        $prix = $produit->getPrixHt();
        $tva = ($produit->getTva()/100) * $prix;

        $prix = $prix + $tva;
        $prix_total = $prix_total + $prix;
        $prix = number_format($prix, 2, '.', '');

        require('views/panier_produit.phtml');
        $count++;
    }
?>