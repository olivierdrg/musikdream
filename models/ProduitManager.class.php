<?php
/**
* @file : ProduitManager.class.php
*
*/
class ProduitManager {

    private $link;

    public function __construct( $link ) {
        $this->link = $link;
    }

    // public function findByPanierQuantite(Panier $panier) {
    //     $id = $panier->getId();
    //     $list = [];
    //     $request = 'SELECT * FROM produit
    //         INNER JOIN liaison_panier_produit ON liaison_panier_produit.id_produit=produit.id
    //         WHERE liaison_panier_produit.id_panier='.$id;
    //     $res = mysqli_query( $this->link, $request );

        
    //     while ( $produit = mysqli_fetch_object( $res, 'Produit', array( $this->link ) ) )
    //         $list[] = $produit;
    //     return $list;
    // }

    public function findByPanier(Panier $panier) {
        $id = $panier->getId();
        $list = [];
        $request = 'SELECT * FROM produit
            INNER JOIN liaison_panier_produit ON liaison_panier_produit.id_produit=produit.id
            WHERE liaison_panier_produit.id_panier='.$id;
        $res = mysqli_query( $this->link, $request );
        while ( $produit = mysqli_fetch_object( $res, 'Produit', array( $this->link ) ) )
            $list[] = $produit;
        return $list;
    }

    public function findAll() {

        //print_r(get_declared_classes());
        $list = [];
        $request = 'SELECT * FROM produit';
        $res = mysqli_query( $this->link, $request );
        while ( $produit = mysqli_fetch_object( $res, 'Produit', array( $this->link ) ) )
            $list[] = $produit;
        return $list;
    }

    public function findById( $id ) {
        $id = intval( $id );
        $request = 'SELECT * FROM produit WHERE id = ' . $id;
        $res = mysqli_query( $this->link, $request );
        $produit = mysqli_fetch_object( $res, 'Produit', array( $this->link ) );
        return $produit;
    }  

    public function findBySousCategorie(SousCategorie $sous_categorie ) {
        $list = [];
        $id = $sous_categorie->getId();
        $request = 'SELECT * FROM produit WHERE id_sous_categorie = ' . $id;
        $res = mysqli_query( $this->link, $request );
        while ( $produit = mysqli_fetch_object( $res, 'Produit', array( $this->link ) ) )
            $list[] = $produit;
        return $list;
    } 

    public function getById( $id ) {
        return $this->findById( $id );
    }

    public function create( $data ) {

        $produit = new Produit();

        if ( !isset( $data['id_sous_categorie'] ) ) throw new Exception ("id sous categorie manquant");
        if ( !isset( $data['reference'] ) ) throw new Exception ("Référence manquant");
        if ( !isset( $data['stock'] ) ) throw new Exception ("stock manquant");
        if ( !isset( $data['prix_ht'] ) ) throw new Exception ("Prix ht manquant");
        if ( !isset( $data['tva'] ) ) throw new Exception ("Tva manquante");
        if ( !isset( $data['description'] ) ) throw new Exception ("Déscription manquante" ); 
        if ( !isset( $data['photo'] ) ) throw new Exception ("Photo manquante");     
        if ( !isset( $data['nom'] ) ) throw new Exception ("Nom manquant");  
        if ( !isset( $data['poids'] ) ) throw new Exception ("Poids manquant");  
        if ( !isset( $data['actif'] ) ) throw new Exception ("Actif manquant");              
    

        $produit->setIdSousCategorie( $data['id_sous_categorie'] );
        $produit->setReference( $data['reference'] );
        $produit->setStock( $data['stock'] );
        $produit->setPrixHt( $data['prix_ht'] );
        $produit->setTva( $data['prix_ht'] );
        $produit->setDescription( $data['description'] );
        $produit->setPhoto( $data['photo'] );
        $produit->setNom( $data['nom'] );
        $produit->setPoids( $data['poids'] );
        $produit->setActif( $data['actif'] );


        $id_sous_categorie  = mysqli_real_escape_string( $this->link, $produit->getIdSousCategorie() );
        $reference          = mysqli_real_escape_string( $this->link, $produit->getReference() );
        $stock              = mysqli_real_escape_string( $this->link, $produit->getStock() );
        $prix_ht            = mysqli_real_escape_string( $this->link, $produit->getPrixHt() );
        $tva                = mysqli_real_escape_string( $this->link, $produit->getTva() );
        $description        = mysqli_real_escape_string( $this->link, $produit->getDescription() );
        $photo              = mysqli_real_escape_string( $this->link, $produit->getPhoto() );
        $nom                = mysqli_real_escape_string( $this->link, $produit->getNom() );
        $poids              = mysqli_real_escape_string( $this->link, $produit->getPoids() );
        $actif              = mysqli_real_escape_string( $this->link, $produit->getActif() );

        $request = "INSERT INTO produit (id_sous_categorie, reference, stock, prix_ht, tva, description, photo, nom, poids, actif ) 
            VALUES('" . $id_sous_categorie . "', '" . $reference . "', '" . $stock . "', '" . $prix_ht . "', '" . $tva . "', '" . $description . "', '" . $photo . "', '" . $nom . "', '" . $poids . "', '" . $actif . "')";

        $res = mysqli_query( $this->link, $request );
        
        // Si la requete s'est bien passée
        if ( $res ) {
            $id = mysqli_insert_id( $this->link );
            
            // si c'est bon id > 0
            if ( $id ) {
                $utilisateur = $this->findById( $id );
                return $utilisateur;    
            }
            else// Sinon
                throw new Exception ("Internal server error");                
        }
        else// Sinon
            throw new Exception ("Internal server error");
                
    }    



    public function update( Produit $produit ) { // type-hinting
        var_dump( $produit );
        $id = $produit->getId();

        if ( $id ) {// true si > 0
            $id_sous_categorie  = mysqli_real_escape_string( $this->link, $produit->getIdSousCategorie() );
            $reference          = mysqli_real_escape_string( $this->link, $produit->getReference() );
            $stock              = mysqli_real_escape_string( $this->link, $produit->getStock() );
            $prix_ht            = mysqli_real_escape_string( $this->link, $produit->getPrixHt() );
            $tva                = mysqli_real_escape_string( $this->link, $produit->getTva() );
            $description        = mysqli_real_escape_string( $this->link, $produit->getDescription() );
            $photo              = mysqli_real_escape_string( $this->link, $produit->getPhoto() );
            $nom                = mysqli_real_escape_string( $this->link, $produit->getNom() );
            $poids              = mysqli_real_escape_string( $this->link, $produit->getPoids() );
            $actif              = mysqli_real_escape_string( $this->link, $produit->getActif() );

            $request = "UPDATE produit SET id_sous_categorie='" . $id_sous_categorie . "', reference='" . $reference . "', stock='" . $stock . "', prix_ht='" . $prix_ht . "', tva='" . $tva . "', description='" . $description . "', photo='" . $photo . "', nom='" . $nom . "', poids='" . $poids . "', actif='" . $actif . "' WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }

    public function remove( Produit $produit ) {
        $id = $produit->getId();

        if ( $id ) {
        
            $request = "DELETE FROM produit WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $produit; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }  

}
?>
