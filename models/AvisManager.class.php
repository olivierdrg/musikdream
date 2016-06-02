<?php

class AvisManager
{
	private $link;

	public function __construct( $link ) 
	{
        $this->link = $link;
    }

    public function findAll() 
    {
        $list = [];
        $request = "SELECT * FROM avis";
        $res = mysqli_query( $this->link, $request );
        while ($avis = mysqli_fetch_object( $res, "Avis" ) )
            $list[] = $avis;
        return $list;
    }

    public function findById( $id ) 
    {
        $id = intval( $id );
        $request = "SELECT * FROM avis WHERE id = " . $id;
        $res = mysqli_query( $this->link, $request );
        $avis = mysqli_fetch_object( $res, "Avis" );
        return $avis;
    }

    public function findByIdProduit( $id_produit ) 
    {
        $id_produit = intval( $id_produit );
        $request = "SELECT * FROM avis WHERE id_produit = " . $id_produit;
        $res = mysqli_query( $this->link, $request );
        $avis = mysqli_fetch_object( $res, "Avis" );
        return $avis;
    }  

    public function findByIdUtilisateur( $id_utilisateur ) 
    {
        $id_utilisateur = intval( $id_utilisateur );
        $request = "SELECT * FROM avis WHERE id_utilisateur = " . $id_utilisateur;
        $res = mysqli_query( $this->link, $request );
        $avis = mysqli_fetch_object( $res, "Avis" );
        return $avis;
    }      

	public function getById( $id ) 
    {
        return $this->findById( $id );
    }

    public function getByIdProduit( $id_produit ) 
    {
        return $this->findByIdProduit( $id_produit );
    }

    public function getByIdUtilisateur( $id_utilisateur ) 
    {
        return $this->findByIdUtilisateur( $id_utilisateur );
    }


    public function create( $data ) 
    {

        $avis = new Avis();

    if ( !isset( $data['contenu'] ) ) throw new Exception ("Contenu manquant");
    // if ( !isset( $data['date'] ) ) throw new Exception ("Date manquante");

    $utilisateur = $_SESSION['id'];
    $produit = 1;


    $avis->setContenu( $data['contenu'] );
    // $avis->setDate( $data['date'] );
    $avis->setNote( $data['note'] );

    $contenu = $avis->getContenu();
    $note = $avis->getNote();

    $request = "INSERT INTO avis (contenu, note, id_produit, id_utilisateur) 
            VALUES('" . $contenu . "', '" . $note . "', '".$utilisateur."', '".$produit."' )";

    $res = mysqli_query( $this->link, $request );
        
        // Si la requete s'est bien passée
        if ( $res ) 
        {
            $id = mysqli_insert_id( $this->link );
            
            // si c'est bon id > 0
            if ( $id ) 
            {
                $avis = $this->findById( $id );
                return $avis;    
            }
            else// Sinon
                throw new Exception ("Internal server error");                
        }
        else// Sinon
            throw new Exception ("Internal server error");
                
    }  


    public function update( Avis $avis ) 
    { // type-hinting
        $id = $avis->getId();

        if ($id) 
        {// true si > 0
            $contenu                = mysqli_real_escape_string( $this->link, $avis->getContenu());
            $date             		= mysqli_real_escape_string( $this->link, $avis->getDate());
            $note                   = mysqli_real_escape_string( $this->link, $avis->getNote()); 

			$request = "UPDATE avis SET contenu='" . $contenu . "', date='" . $date . "', note='" . $note . "', WHERE id=" . $id;
            if ( $res )
                return $this->findById( $id );
            else
                throw new Exception ("Internal server error");
        }
    }

    public function remove(Avis $avis ) 
    {
        $id = $avis->getId();

        if ( $id ) 
        {// true si > 0
        
            $request = "DELETE FROM avis WHERE id=" . $id;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $avis; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }

    public function removeByProduit(Avis $avis ) 
    {
        $id_produit = $avis->getIdProduit();

        if ( $id_produit ) 
        {// true si > 0
        
            $request = "DELETE FROM avis WHERE id_produit=" . $id_produit;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $avis; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }

    public function removeByUtilisateur(Avis $avis ) 
    {
        $id_utilisateur = $avis->getIdUtilisateur();

        if ( $id_utilisateur ) 
        {// true si > 0
        
            $request = "DELETE FROM avis WHERE id_utilisateur=" . $id_utilisateur;
            $res = mysqli_query( $this->link, $request );
            if ( $res )
                return $avis; // ou true
            else
                throw new Exception ("Internal server error");
        }
    }      

}
?>