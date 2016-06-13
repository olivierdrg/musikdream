<?php

if ( isset( $_REQUEST['action'] ) ) {
    
    if ( $_REQUEST['action'] == 'recherche' ) {

        $manager = new ProduitManager( $link );// $link => $this->link

        $list_search = $manager->search( $_REQUEST['s'] );

    }
}
?>