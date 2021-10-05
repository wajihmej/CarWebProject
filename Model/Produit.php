<?PHP
	class Produit{
		private $id;
		private $nom;
		private $prix;
		private $image;
		private $informations;

		
		function __construct($nom,$prix,$image,$informations){
			
			$this->nom=$nom;
			$this->prix=$prix;
			$this->image=$image;
			$this->informations=$informations;
		}
		
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getImage(){
			return $this->image;
		}
		function getPrix(){
			return $this->prix;
		}
		function getInformation(){
			return $this->informations;
		}


		function setNom($nom){
			$this->nom=$nom;
		}
		function setPrix($prix){
			$this->prix=$prix;
		}
		function setImage($image){
			$this->image=$image;
		}
		function setInformation($informations){
			$this->informations=$informations;
		}		
	

	}
?>