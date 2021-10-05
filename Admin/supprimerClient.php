<?PHP
include "../Controller/ClientC.php";
include "../Controller/AchatC.php";


$clientC=new ClientC();
$achatC=new AchatC();
if (isset($_POST["id"])){
	$achatC->supprimerAchatClient($_POST["id"]);

	$clientC->supprimerClient($_POST["id"]);
	header('Location: AfficherClients.php');
}

?>