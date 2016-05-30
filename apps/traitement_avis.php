<?php
if ( isset( $_POST['action'] ) ) 
{
    
    if ($_POST['action'] == 'admin_ajout_avis') 
    {

        $manager = new AvisManager( $link );// $link => $this->link
        try 
        {
            $avis = $manager->create( $_POST );

            header('Location: index.php?page=admin_liste_avis');
            exit;
        }

        catch ( Exception $exception )
        {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'admin_modif_avis' ) 
    {
        $manager = new AvisManager( $link );// $link => $this->link
        try 
        {
            $avis = $manager->/*modif*/( $_POST );

            header('Location: index.php?page=admin_avis');
            exit;
        }

        catch (Exception $exception) 
        {
            $error = $exception->getMessage();
        }
    }

    if ( $_POST['action'] == 'admin_supp_avis' )
    	$manager = new AvisManager( $link );// $link => $this->link
        try 
    {
        $manager = new AvisManager( $link );// $link => $this->link
        try 
        {
            $avis = $manager->delete( $_POST );

            header('Location: index.php?page=admin_avis');
            exit;
        }

        catch (Exception $exception) 
        {
            $error = $exception->getMessage();
        }
    } 
}
?>