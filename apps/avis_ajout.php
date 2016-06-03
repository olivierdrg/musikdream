<?php
	$id_utilisateur  = '';
	$id_produit		 = '';
	$contenu		 = '';
	$date			 = '';
	$note			 = '';

	if ( isset( $_POST['id_utilisateur'] ) ) $id_utilisateur = $_POST['id_utilisateur'];
	if ( isset( $_POST['id_produit'] ) ) $id_produit = $_POST['id_produit'];
	if (isset( $_POST['contenu'] ) ) $contenu = $_POST['contenu'];
	if (isset( $_POST['date'] ) ) $date = $_POST['date'];
	if (isset( $_POST['note'] ) ) $note = $_POST['note'];

	require('views/avis_ajout.phtml');
?>