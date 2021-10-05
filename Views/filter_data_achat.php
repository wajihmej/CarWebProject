<?php

include  "../Controller/AchatC.php";

$achatc= new AchatC();
session_start();
$test = $_POST['str'] ;

if($test == 'false'){
    $liste=$achatc->afficherAchatWithID($_SESSION['idclient']);
}
else
{
    $liste = $achatc->triachat($_SESSION['idclient']);
}

foreach($liste as $row){
?>

<tr class="cart-product">

<?php
$listprod=$achatc->afficherImageProductAchats($row['id_prod']);
foreach($listprod as $row2){
?>
<td class="cart-product-item">
<div class="cart-product-img">
<img src="../Admin/<?php echo $row2['image']; ?>" width=100 alt="product" />
</div>
<div class="cart-product-name">
<h6><?php echo $row2['nom']; ?></h6>
</div></td>
<td class="cart-product-price"><?php echo $row2['prix']; ?> TND</td>
<td class="cart-product-quantity"><div class="product-quantity">
<input type="text" value="<?php echo $row['quatite']; ?>" id="pro1-qunt" readonly>
</div></td>
<td class="cart-product-total"><?php echo $row['prix_total']; ?> TND</td>

<?php
}
?>

</tr>

<?php
}

?>