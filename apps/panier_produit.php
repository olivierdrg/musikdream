<?php
    $option_selected = [
                        '1' => ['selected','','','','','','','',''],
                        '2' => ['','selected','','','','','','',''],
                        '3' => ['','','selected','','','','','',''],
                        '4' => ['','','','selected','','','','',''],
                        '5' => ['','','','','selected','','','',''],
                        '6' => ['','','','','','selected','','',''],
                        '7' => ['','','','','','','selected','',''],
                        '8' => ['','','','','','','','selected',''],
                        '9' => ['','','','','','','','','selected']
                        ];

    $list = $panier->getProduits();
    $count = 0;
    $max = sizeof($list);
    while ($count < $max)
    {
        $produit = $list[$count];

        $poids = $produit->getPoids()/1000;
        $poids_total = $poids_total + $poids;

        $prix = $produit->getPrixHt();
        $tva = ($produit->getTva()/100) * $prix;

        $prix = $prix + $tva;
        $prix_total = $prix_total + $prix;
        $prix = number_format($prix, 2, '.', '');

        $quantite = $produit->getQuantite();

        require('views/panier_produit.phtml');
        $count++;
    }
?>