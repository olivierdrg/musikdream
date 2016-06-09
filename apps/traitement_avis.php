<?php

    if ( isset( $_POST['action'] ) ) 
    {
        if ( !isset( $_SESSION['login'] ) ) {
            header('Location: index.php?page=login');
            exit;
        }
        
        if ($_POST['action'] == 'admin_avis_ajout') 
        {
            
            $nb = intval($_POST['note']);
            if($nb > 0 && $nb < 6){
            
                $manager = new AvisManager( $link );
                try 
                {
                    $produitManager = new ProduitManager($link);
                    $produit = $produitManager->findById($_POST['id_produit']);

                    $utilisateurManager = new UtilisateurManager($link);
                    $utilisateur = $utilisateurManager->findById($_SESSION['id']);

                    $avis = $manager->create( $_POST, $produit, $utilisateur );

                    header('Location: index.php?page=detail_produit&id_produit='.$produit->getId());
                    exit;
                }

                catch ( Exception $exception )
                {
                    $error = $exception->getMessage();
                }
            }
            else{
                $nb = 0;
            }
        }
    }
?>
