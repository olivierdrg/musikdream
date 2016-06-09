<?php

if(htmlentities( $panier->getQuantite()) != 0)
	require('views/bouton_payer.phtml');
?>
