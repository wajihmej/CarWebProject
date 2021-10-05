<?PHP
include "../Controller/PanierC.php";


$panierC=new PanierC();
if (isset($_GET["id"])){
	$panierC->supprimerPanier($_GET["id"]);
	header('Location: Panier.php');
}

?>