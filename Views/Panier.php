<?php
session_start();


include  "../Controller/PanierC.php";
include  "../Model/Panier.php";

include  "../Controller/AchatC.php";
include  "../Model/Achat.php";

$panierC= new PanierC();
$prixtot=$panierC->countPrixTotalPanier();
$sum = 0;
foreach($prixtot as $row){
   $score = $row['prix_total'];
   $sum += (int)$score;
}   
    $listaaa=$panierC->afficherPanierWithID();


if(isset($_POST['achat']))
{

    if(!isset($_SESSION['client'])){
        echo "<script type='text/javascript'>";
        echo "alert('Veuillez vous connecter !');
        window.location.href='Connexion.php';";
        echo "</script>";
    }
    else
    {
        $achatC= new AchatC();

        foreach($listaaa as $row){
            $achat=new Achat($_SESSION['idclient'],$row['id_prod'],$row['quatite'],$row['prix_total']);
            $achatC->ajouterAchat($achat);  
            $panierC->supprimerPanier($row["id"]);
        }
        echo "<script type='text/javascript'>";
        echo "alert('Achat effectué avec succès !');
        window.location.href='MesAchats.php';";
        echo "</script>";

    }



}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/autoshop/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="author" content="zytheme" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="construction html5 template">
<link href="assets/images/favicon/favicon.ico" rel="icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CRaleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CUbuntu:300,300i,400,400i,500,500i,700,700i" rel='stylesheet' type='text/css'>

<link href="assets/css/external.css" rel="stylesheet">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/custom.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

<title>Autoshop | Shop-cart</title>
</head>
<body>

<div id="wrapper" class="wrapper clearfix">
<?php include"header.php" ?>


<section id="page-title" class="page-title">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">
<h1>shop cart</h1>
</div>

<div class="col-xs-12 col-sm-12 col-md-6">
<ol class="breadcrumb text-right">
<li>
<a href="index.html">Home</a>
</li>
<li class="active">shop cart</li>
</ol>
</div>

</div>

</div>

</section>


<section id="shopcart" class="shop shop-cart">
<div class="container">
<div class="row">
<div class="col-xs-12  col-sm-12  col-md-12">
<div class="cart-table table-responsive">
<table class="table table-bordered">
<thead>
<tr class="cart-product">
<th class="cart-product-item">Product</th>
<th class="cart-product-price">Price</th>
<th class="cart-product-quantity">Quantity</th>
<th class="cart-product-total">Total</th>
</tr>
</thead>
<tbody>

<?php
foreach($listaaa as $row){
?>

<tr class="cart-product">

<?php
$listprod=$panierC->afficherImageProductPaniers($row['id_prod']);
foreach($listprod as $row2){
?>
<td class="cart-product-item"><div class="cart-product-remove">
<a href="supprimerPanier.php?id=<?PHP echo $row['id']; ?>" class="fa fa-close"></a>
</div>
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

<tr class="cart-product-action">
<td colspan="4"><div class="row clearfix">

                            <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                            </div>


<div class="col-xs-12 col-sm-6 col-md-6 text-right">
<form method="POST" >
<input class="btn btn-primary" type="submit" value="Proceed To Checkout" name="achat" id="achat">
</form>
</div>

</div></td>
</tr>
</tbody>
</table>
</div>

</div>



<div class="col-xs-12  col-sm-12  col-md-6">
<div class="cart-total-amount">
<h6>Cart Totals :</h6>
<ul class="list-unstyled">
<li>Cart Subtotal :<span class="pull-right text-right"><?php echo $sum; ?> TND</span></li>
<li>Shipping :<span class="pull-right text-right">Free Shipping</span></li>
<li>Order Total :<span class="pull-right text-right"><?php echo $sum; ?> TND</span></li>
</ul>
</div>

</div>

</div>

</div>

</section>


<?php include"footer.php" ?>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/functions.js"></script>
</body>

<!-- Mirrored from demo.zytheme.com/autoshop/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:16 GMT -->
</html>
