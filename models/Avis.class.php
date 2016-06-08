<?php
	class Avis
	{
		// Déclaration des propriétés privées.
		private $id;
		private $id_utilisateur;
		private $id_produit;
		private $contenu;
		private $date;
		private $note;

		private $star;
		private $utilisateur;// NULL
		private $produit;

		private $link;

		public function __construct( $link ) {
	        $this->link = $link;
	    }

	    public function getUtilisateur()
	    {
	    	if ($this->utilisateur === null)
	    	{
	    		$manager = new UtilisateurManager($this->link);
	    		$this->utilisateur = $manager->findById($this->id_utilisateur);
	    	}
	    	return $this->utilisateur;
	    }
	    public function getProduit()
	    {
	    	if ($this->produit === null)
	    	{
	    		$manager = new ProduitManager($this->link);
	    		$this->produit = $manager->findById($this->id_produit);
	    	}
	    	return $this->produit;
	    }

		// Getter/Setter | Accesseur/Mutateur | Accessor/Mutator

		public function getId() 
		{
			return $this->id;
		}

		public function getIdUtilisateur() 
		{
			return $this->id_utilisateur;
		}


		public function getIdProduit() 
		{
			return $this->id_produit;
		}
		
		public function getContenu() 
		{
			return $this->contenu;
		}

		public function getDate() 
		{
			return $this->date;
		}

		public function getNote() 
		{
			return $this->note;
		}

		public function getStar() 
		{
			$this->star = str_repeat('', $this->getNote());
			return $this->star;
		}


		public function setContenu( $contenu ) 
		{
        if ( strlen( $contenu ) < 10 ) 
            throw new Exception ("Contenu trop court (< 10)");
        else if ( strlen( $contenu ) > 300 )
            throw new Exception ("contenu trop long (> 300)");            

        $this->contenu = $contenu;
    	}

    	public function setDate( $date) 
    	{
    	  $date = date("m/d/Y H\hi");

    	 $this->date = $date;
		}

		public function setNote( $note )
		{
		$this->note = $note;
		}
}
?>