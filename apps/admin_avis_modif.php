<?php
	if ( isset( $_GET['id'] ) ) 
	{
		$id = $_GET['id'];
 
        $avis = $manager->findByIdAvis($_POST['id_avis']);

		$form = array(
        'success'       => true,
        'message'       => '',
        'id-utilisateur' => array(
            'value' => htmlentities ($avis->getIdUtilisateur()),
            'class' => '',
        ),
        'success'       => true,
        'message'       => '',
        'id_produit' => array(
            'value' => htmlentities ($avis->getIdProduit()),
            'class' => '',
        ),
        'titre' => array(
            'value' => htmlentities ($avis->getTitre()),
            'class' => '',
        ),
        'contenu' => array(
            'value' => htmlentities ($avis->getContenu()),
            'class' => '',
        ), 	
        'note' => array(
            'value' => htmlentities ($avis->getNote()),
            'class' => '',
        
        )
    );
    require('views/admin_avis_modif.phtml');
	}

    
?>