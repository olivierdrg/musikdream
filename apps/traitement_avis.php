<?php
if ( isset( $_POST['action'] ) ) 
{
    
    if ($_POST['action'] == 'avis_ajout') 
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

    if ( $_POST['action'] == 'avis_modif' ) 
    {
        $manager = new AvisManager( $link );// $link => $this->link
        try 
        {
            $avis = $manager->findById($_POST['id_avis']);
            $avis->setContenu($_POST['contenu']);
            $avis->setNote($_POST['note']);
            $manager->update( $avis );

            header('Location: index.php?page=avis');
            exit;
        }

        catch (Exception $exception) 
        {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'admin_supp_avis' ) 
    {
        $manager = new AvisManager( $link );// $link => $this->link
        try 
        {
            $avis = $manager->findById($_POST['id_avis']);
            $manager->delete( $avis );

            header('Location: index.php?page=avis');
            exit;
        }

        catch (Exception $exception) 
        {
            $error = $exception->getMessage();
        }
    } 
}
?>