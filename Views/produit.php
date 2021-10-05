<?php

session_start();

include "../Model/Produit.php";
include "../Controller/ProduitC.php";


$produitC = new ProduitC();
    $result=$produitC->afficherProduitWithID($_GET['id']);

    foreach($result as $row){
    $id=$row['id'];
    $nom=$row['nom'];
    $prix=$row['prix'];
    $informations=$row['informations'];
    $image=$row['image'];
        }

if(isset($_POST['achat']))
{
    echo $_POST['quantity'] ;
    header("location: AjouterPanier.php?id=". $row['id']."&prix=".$row['prix']."&qty=".$_POST['quantity'] );
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/autoshop/shop-single-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:12 GMT -->
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

<title>Autoshop | Produit</title>
</head>
<body>

<div id="wrapper" class="wrapper clearfix">
<?php include"header.php" ?>


<section id="page-title" class="page-title">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">
<h1>Shop Single Product</h1>
</div>

<div class="col-xs-12 col-sm-12 col-md-6">
<ol class="breadcrumb text-right">
<li>
<a href="index.html">Home</a>
</li>
<li class="active">shop</li>
</ol>
</div>

</div>

</div>

</section>


<section id="shopgrid" class="shop shop-single">
<div class="container shop-content">


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-5">
<div class="prodcut-images">
<div class="product-img-slider">
<img src="../Admin/<?php echo $image; ?>" alt="product image">
</div>
 	
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-7">
<div class="product-title text-center-xs">
<h3><?php echo $nom; ?></h3>
</div>

<div class="product-meta mb-30">
<div class="product-price pull-left pull-none-xs">
<p><?php echo $prix; ?> TND </p>
</div>


</div>



<hr class="mt-30 mb-30">
<div class="product-details text-center-xs">
<h5>Other Details :</h5>
<ul class="list-unstyled">
<li>Brand : <span><?php echo $informations ;?></span></li>
</ul>
</div>

<hr class="mt-30 mb-30">
<div class="product-action">

<div class="product-cta text-right text-center-xs">
<a class="btn btn-primary" href="AjouterPanier.php?id=<?PHP echo $_GET['id'] ?>&prix=<?PHP echo $prix ?>" >add to cart</a>
</div>
</div>

<hr class="mt-30 mb-30">


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

<!-- Mirrored from demo.zytheme.com/autoshop/shop-single-fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:16 GMT -->
</html>