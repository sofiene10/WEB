<?PHP
	include "../config.php";
	require_once '../model/event.php';

	class eventC {
		
		function addEvent($event)
		{			
		$dba=config::getConnexion();
			
		$sqlQuery = " INSERT INTO evenement (NomEvenement,dateEvenement,prixEvenement,destinationEvenement,image) VALUES (:NomEvenement,:dateEvenement,:prixEvenement,:destinationEvenement,:image)" ;		   
				try{
					$req=$dba->prepare($sqlQuery);
				   
					$req->bindValue(':NomEvenement',$event->getNomEvenement());
					$req->bindValue(':dateEvenement',$event->getdateEvenement());
					$req->bindValue(':prixEvenement',  $event->getprixEvenement());
					$req->bindValue(':destinationEvenement',  $event->getdestinationEvenement());
					$req->bindValue(':image',  $event->getImage());
	
					$req->execute();
					}
	
				 catch (Exception $e){
				echo '\n Erreur: '.$e->getMessage();
		}
	}

		function ajouterevent($event){
			$sql="INSERT INTO evenement (NomEvenement,dateEvenement,prixEvenement,destinationEvenement,image) 
			VALUES (:NomEvenement,:dateEvenement,:prixEvenement,:destinationEvenement,:image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'NomEvenement' => $event->getNomEvenement(),
					'dateEvenement' => $event->getdateEvenement(),
					'prixEvenement' => $event->getprixEvenement(),
					'destinationEvenement' => $event->getdestinationEvenement(),
					'image' => $event->getimage() 
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherevents(){
			
			$sql="SELECT * FROM evenement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}


		function affichereventsFront(){
			
			$sql="SELECT * FROM evenement WHERE dateEvenement > CURRENT_TIMESTAMP";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerevent($IDEvenement){
			$sql="DELETE FROM evenement WHERE IDEvenement= :IDEvenement";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDEvenement',$IDEvenement);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierevent($event, $IDEvenement){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE evenement SET 
						NomEvenement  = :NomEvenement ,
						dateEvenement = :dateEvenement,
						prixEvenement = :prixEvenement,
						destinationEvenement = :destinationEvenement,
						image = :image
					WHERE IDEvenement = :IDEvenement'
				);
				$query->execute([
					'NomEvenement' => $event->getNomEvenement (),
					'dateEvenement' => $event->getdateEvenement(),
					'prixEvenement' => $event->getprixEvenement(),
					'destinationEvenement' => $event->getdestinationEvenement(),
					'image' => $event->getimage(),
					'IDEvenement' => $IDEvenement	
				]);
				
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererevent($IDEvenement){
			$sql="SELECT * from evenement where IDEvenement=$IDEvenement";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$evt=$query->fetch();
				return $evt;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererevent1($IDEvenement){
			$sql="SELECT * from evenement where IDEvenement=$IDEvenement";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$evt = $query->fetch(PDO::FETCH_OBJ);
				return $evt;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>