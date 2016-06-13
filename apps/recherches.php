<?php
if ( isset( $_GET['action'] ) ) {
    
    if ( $_GET['action'] == 'recherche' ) {

        $manager = new ProduitManager( $link );// $link => $this->link

        $list_search = $manager->search( $_GET['s'] );
        if ( isset( $list_search ) ) {
            require('views/recherches.phtml');
        }
    }
}
    
?>