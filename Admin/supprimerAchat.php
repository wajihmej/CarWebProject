<?PHP
include "../Controller/AchatC.php";
include  "../Controller/LivraisonC.php";


$achatC=new AchatC();
$livraisonC= new LivraisonC();

if (isset($_POST["id"])){
	$livraisonC->supprimerLivraison($_POST["id"]);
	$achatC->supprimerAchat($_POST["id"]);
	header('Location: AfficherAchats.php');
}

?>