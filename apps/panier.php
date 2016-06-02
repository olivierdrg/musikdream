<?php

if (isset($_SESSION['id']))

{
    $panierM = new PanierManager($link);
    $panier = $panierM->findByIdUtilisateur($_SESSION['id']);
    
    $prix_total=0;
    
    // var_dump($panier);
    if ($panier){
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