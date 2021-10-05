<?PHP
include "../Controller/AdminC.php";


$adminC=new AdminC();
if (isset($_POST["id"])){
	$adminC->supprimerAdmin($_POST["id"]);
	header('Location: AfficherAdmins.php');
}

?>