<?php

if (isset($_SESSION['id']))

{
    $panierM = new PanierManager($link);
    $panier = $panierM->findByIdUtilisateur($_SESSION['id']);
    
    // $produitM = new ProduitManager($link);
    // $produit = $produitM->findById();    
    
    $prix_total=0;
    
    // var_dump($panier);
    if ($panier){

        $prix = $panier->getPrix();
        $tva =  $prix / 0.2;
        $prix = $prix + $tva;

    	require('views/panier.phtml');
    }
    else{
    	$error = "Votre panier est vide";
    }
}
else{
	$error = "Pour visualiser votre panier vous devez être connecté";
}


?>