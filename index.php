<?php    
    session_start();
    require('config.php');
    require('apps/functions.php');

    function __autoload( $className ) {
        require('models/' . $className . '.class.php' );
    }

    $link = mysqli_connect( $serveur ,$username, $password, $database);
    if ( !$link ) {
        require('views/bigerror.phtml');
        exit;
    }

    define( 'LIB', 'public/' );
    define( 'IMAGE_PATH', LIB . 'images/' );
    define( 'CSS_PATH', LIB . 'css/' );
    define( 'JS_PATH', LIB . 'js/' );
    define( 'STAR', '' ); // fontawesome fa-star 
    

    $page = 'categories';
    $error = '';

    $access = array(
        'categories',
        'souscategories',
        'produits',
        'detail_produit',
        'login',
        'logout',
        'register',
        'profil',
        'panier',
        'admin_categories',
        'admin_categorie_ajout',
        'admin_categorie_modif',
        'admin_souscategorie_ajout',
        'admin_souscategorie_modif',
        'admin_produits',
        'admin_produit_ajout',
        'admin_produit_modif',
        'admin_produit_cache',
        'avis',
        'avisliste',
        'admin_avisliste',
        'admin_avis_ajout',
        'admin_avis_modif',
        'recap_panier',
        'admin_commandes',
        'recherches'
    );

    $access_traitement = array(      
        'login'                     => 'utilisateur',
        'logout'                    => 'utilisateur',
        'register'                  => 'utilisateur',
        'profil'                    => 'utilisateur',
        'update'                    => 'utilisateur',
        'panier'                    => 'panier',
        'admin'                     => 'admin',
        'admin_categories'          => 'categorie',
        'admin_categorie_ajout'     => 'categorie',
        'admin_categorie_modif'     => 'categorie',
        'admin_souscategorie_ajout' => 'souscategorie',
        'admin_souscategorie_modif' => 'souscategorie',
        'admin_produits'            => 'produit',
        'admin_produit_ajout'       => 'produit',
        'admin_produit_modif'       => 'produit',
        'admin_produit_cache'       => 'produit',
        'avis'                      => 'avis',
        'avisliste'                 => 'avis',
        'admin_avisliste'           => 'avis',
        'admin_avis_ajout'          => 'avis',
        'admin_avis_modif'          => 'avis',
        'detail_produit'            => 'avis',
        'admin_commandes'           => 'admin_commande',
        'recherches'                => 'recherche',
    );

    if ( isset( $_GET['page'] ) ) {
        if ( in_array( $_GET['page'], $access ) ) {
            $page = $_GET['page'];
        }
    }

    if ( isset( $access_traitement[$page] ) ) {
        require('apps/traitement_' . $access_traitement[$page] . '.php' );
    }

    if ( isset( $_GET['ajax'] ) ) {

        require('apps/recherche.php');
    } else
        require('apps/skel.php');

?>