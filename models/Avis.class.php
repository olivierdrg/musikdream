<?php
	class Avis
	{
		// Déclaration des propriétés privées.
		private $id;
		private $id_utilisateur;
		private $id_produit;
		private $titre;
		private $contenu;
		private $date;
		private $note;

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
		public function getTitre() 
		{
			return $this->titre;
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



		public function setTitre( $titre ) 
		{
        if ( strlen( $titre ) < 10 ) 
            throw new Exception ("Titre trop court (< 5)");
        else if ( strlen( $titre ) > 300 )
            throw new Exception ("Titre trop long (> 30)");            

        $this->titre = $titre;
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