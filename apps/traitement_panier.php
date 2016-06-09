<?php
    if ( !isset( $_SESSION['login'] ) ) {
        header('Location: index.php?page=login');
        exit;
    }

    if ( isset( $_POST['action'] ) ) {
        if ($_POST['action'] == 'ajout') {

            $panier_manager = new PanierManager( $link );
            $produit_manager = new ProduitManager( $link );
            try {
                $id = intval( $_POST['id'] );

                $produit = $produit_manager->findById( $id );

                if ( $produit != null ) {
                    $panier = $panier_manager->getCurrent();
                    $panier->addProduit( $produit );
                    $panier_manager->update( $panier );

                    header('Location: index.php?page=panier');
                    exit;  
                }  else {
                    $error = 'Données invalides';
                }       
            }

            catch ( Exception $exception ){
                $error = $exception->getMessage();
            }        

        }
       
        if ($_POST['action'] == 'retirer') {
            $panier_manager = new PanierManager( $link );
            $produit_manager = new ProduitManager( $link );
            try {
                $produit = $produit_manager->findById( $_POST['idProduit'] );
                $panier = $panier_manager->getCurrent();
                $panier_manager->removeProduitPanier($panier,  $produit );

                header('Location: index.php?page=panier');
                exit;            
            }

            catch ( Exception $exception ){
                $error = $exception->getMessage();
            }        

        }

        if ($_POST['action'] == 'acheter') {

            $utilisateurM = new UtilisateurManager( $link );
            try {
                $utilisateur = $utilisateurM->getById( $_SESSION['id'] );
                $designation = $utilisateur->getAdresseFacturation()->getDesignation();
                $rue = $utilisateur->getAdresseFacturation()->getRue();
                $cp = $utilisateur->getAdresseFacturation()->getCp();
                $ville = $utilisateur->getAdresseFacturation()->getVille();
                $pays = $utilisateur->getAdresseFacturation()->getPays();

                $designation1 = $utilisateur->getAdresseLivraison()->getDesignation();
                $rue1 = $utilisateur->getAdresseLivraison()->getRue();
                $cp1 = $utilisateur->getAdresseLivraison()->getCp();
                $ville1 = $utilisateur->getAdresseLivraison()->getVille();
                $pays1 = $utilisateur->getAdresseLivraison()->getPays();
            }
            catch (Exception $exception) {
                $error = $exception->getMessage();
            }

            if( $designation && $rue && $cp && $ville && $pays &&
                $designation1 && $rue1 && $cp1 && $ville1 && $pays1)
            {
                // ICI ACHETER ET CHANGER LE STATUT DU PANIER
                try{
                    $panier_manager = new PanierManager( $link );
                    $panier = $panier_manager->getCurrent();
                    $panier->setStatus(1);
                    $panier_manager->update($panier);

                    // Mise à jour du stock
                    $list = $panier->getProduits();
                    $i = 0;
                    $count = count( $list );
                    while ( $i < $count ) {
                        $produit = $list[$i];
                        $stock = $produit->getStock();
                        $stock--;
                        $produit->setStock( $stock );
                        
                        $produit_manager = new ProduitManager( $link );
                        $produit_manager->update( $produit );

                        $i++;
                    }

                }
                catch (Exception $exception) {
                    $error = $exception->getMessage();
                }
                header('Location: index.php?page=recap_panier');
                exit;
            }
            else{
                header('Location: index.php?page=profil');
            }  
        }
    }
?>