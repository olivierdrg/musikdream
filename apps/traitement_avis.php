<?php
if ( isset( $_POST['action'] ) ) 
{
    
    if ($_POST['action'] == 'admin_avis_ajout') 
    {

        $manager = new AvisManager( $link );// $link => $this->link
        try 
        {
            $produitManager = new ProduitManager($link);
            $produit = $produitManager->findById($_POST['id_produit']);
            $utilisateurManager = new UtilisateurManager($link);
            $utilisateur = $utilisateurManager->findById($_SESSION['id']);
            $avis = $manager->create( $_POST, $produit, $utilisateur);
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
        if ( isset( $_POST['id'] ) ) 
        {
            try 
            {
                $manager = new AvisManager( $link );
                $id =  $_POST['id'];
                $avis = $manager->findById( $id );
                $manager->remove( $avis );
            }

            catch (Exception $exception) 
            {
                $error = $exception->getMessage();
            }            
        }
    }    
}
?>


  