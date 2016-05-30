<?php
	$manager = new AvisManager($link);
	$liste_avis = $manager->findAll();

    require('views/admin_avis.phtml');
?>