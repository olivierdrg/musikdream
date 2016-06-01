<?php
// var_dump($page);
// panier.php
// var_dump($_SESSION['id']);

if (isset($_SESSION['id']))

{
    $panierM = new PanierManager($link);
    $panier = $panierM->findByIdUtilisateur($_SESSION['id']);
    // var_dump($panier);
    if ($panier){
    	require('views/panier.phtml');
    }
    else{
    	$error = "Votre panier est vide";
        // header('Location: index.php?page=home');
        // exit;
    }
}
else{
	$error = "Pour visualiser votre panier vous devez être connecté";

}


?>