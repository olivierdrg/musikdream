<?php

if (isset($_SESSION['id']))
{
    $manager = new UtilisateurManager($link);
    $utilisateur = $manager->findById($_SESSION['id']);
    $utilisateur->getPanier();
    
    $prix_total=0;
    $poids_total=0;
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