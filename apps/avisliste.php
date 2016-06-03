<?php
$listeAvis = $produit->getAvis();
$count = 0;
while ($count < sizeof($listeAvis))
{
	$avis = $listeAvis[$count];
    require('views/avisliste.phtml');
    $count++;
}
?>