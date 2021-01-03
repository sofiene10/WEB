<?PHP
	class Event{
		private  $IDEvenement  = null;
		private  $NomEvenement = null;
		private  $dateEvenement = null;
		private  $prixEvenement = null;
		private  $destinationEvenement = null;
		private  $image;
		private  $categorieFK  = null;
			
		function __construct( $NomEvenement,  $dateEvenement,  $prixEvenement,  $destinationEvenement, $image/*,int $categorieFK*/){
			
			$this->NomEvenement=$NomEvenement;
			$this->dateEvenement=$dateEvenement;
			$this->prixEvenement=$prixEvenement;
			$this->destinationEvenement=$destinationEvenement;
			$this->image=$image;
			#$this->categorieFK=$categorieFK;
		}
		
		function getIDEvenement(){
			return $this->IDEvenement;
		}
		function getNomEvenement(){
			return $this->NomEvenement;
		}
		function getdateEvenement(){
			return $this->dateEvenement;
		}
		function getprixEvenement(){
			return $this->prixEvenement;
		}
		function getdestinationEvenement(){
			return $this->destinationEvenement;
		}
		function getcategorieFK(){
			return $this->categorieFK;
		}
		function getimage(){
			return $this->image;
		}
		
		function setIDEvenement($IDEvenement){
			$this->IDEvenement=$IDEvenement;
		}
		function setNomEvenement($NomEvenement){
			$this->NomEvenement=$NomEvenement;
		}
		function setdateEvenement($dateEvenement){
			$this->dateEvenement=$dateEvenement;
		}
		function setprixEvenement($prixEvenement){
			$this->prixEvenement=$prixEvenement;
		}
		function setdestinationEvenement($destinationEvenement){
			$this->destinationEvenement=$destinationEvenement;
		}
		function setcategorieFK($categorieFK){
			$this->categorieFK=$categorieFK;
		}
		function setimage($image){
			$this->image=$image;
		}
	}
?>