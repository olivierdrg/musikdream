<?php

if (isset($_SESSION['id']))
{
    $manager = new UtilisateurManager($link);
    $utilisateur = $manager->findById($_SESSION['id']);
    // $panierM = new PanierManager($link);
    // $panier = $panierM->findByIdUtilisateur($_SESSION['id']);
    $utilisateur->getPanier();
    // $produitM = new ProduitManager($link);
    // $produit = $produitM->findById();    
    
    $prix_total=0;
    
    // var_dump($panier);
    if ($panier){

        $prix_panier = $panier->getPrix();
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