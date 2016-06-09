<?php

    if ( isset( $_POST['action'] ) ) 
    {
        if ( !isset( $_SESSION['login'] ) ) {
            header('Location: index.php?page=login');
            exit;
        }
        
        if ($_POST['action'] == 'admin_avis_ajout') 
        {

            $manager = new AvisManager( $link );
            try 
            {
                $produitManager = new ProduitManager($link);
                $produit = $produitManager->findById($_POST['id_produit']);

                $utilisateurManager = new UtilisateurManager($link);
                $utilisateur = $utilisateurManager->findById($_SESSION['id']);

                $avis = $manager->create( $_POST, $produit, $utilisateur, $note);

                header('Location: index.php?page=detail_produit&id_produit='.$produit->getId());
                exit;
            }

            catch ( Exception $exception )
            {
                $error = $exception->getMessage();
            }
        }

        if ( $_POST['action'] == 'supp' ) 
        {
            $avis_manager = new AvisManager( $link );
            $admin_avisliste_manager = new AdminAvislisteManager( $link );
            try 
                {
                    $admin_avisliste = $admin_avisliste_manager->findById( $_POST['idProduit'] );
                    $avis = $avis_manager->getCurrent();
                    $avis_manager->removeAdminAvislisteAvis($admin_avisliste, $avis);
                    header('Location: index.php?page=admin_avisliste');
                    exit; 
                }

                catch (Exception $exception) 
                {
                    $error = $exception->getMessage();
                }            
            }
        }    
?>


  