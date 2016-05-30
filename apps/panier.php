<?php
// panier.php
if (isset($_SESSION['id']))
{
    $panierM = new PanierManager($link);
    $panier = $panierM->getByIdUser($_SESSION['id']);
}
?>