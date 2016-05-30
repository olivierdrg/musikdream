<?php
	if ( isset( $_GET['id'] ) ) 
	{
		$id = $_GET['id'];

	    $query = 'SELECT * FROM avis WHERE id_avis = ' . $id;
		$res = mysqli_query( $link, $query );
		$ligne = mysqli_fetch_assoc( $res ); 

		$form = array(
        'success'       => true,
        'message'       => '',
        'id-utilisateur' => array(
            'value' => $ligne['id-utilisateur'],
            'class' => '',
        ),
        'success'       => true,
        'message'       => '',
        'id_produit' => array(
            'value' => $ligne['id_produit'],
            'class' => '',
        ),
        'contenu' => array(
            'value' => htmlentities( $ligne['contenu'] ),
            'class' => '',
        ), 	
        'note' => array(
            'value' => htmlentities( $ligne['note'] ),
            'class' => '',
        
        )
    );
    require('views/admin_avis_modif.phtml');
	}
?>