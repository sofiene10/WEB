<?PHP
	include "../controller/eventC.php";
	session_start();
	$eventC=new eventC();
	
	if (isset($_POST["IDEvenement"])){
		$eventC->supprimerevent($_POST["IDEvenement"]);
		header('Location:afficherevents.php');
	}

?>