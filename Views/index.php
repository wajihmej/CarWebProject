<?php
include  "../Controller/ProduitC.php";
session_start();

$produitC= new ProduitC();
    $liste=$produitC->afficherProduits();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/autoshop/home-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:12 GMT -->
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

<title>Autoshop | Acceuil </title>
</head>
<body>

<div id="wrapper" class="wrapper clearfix">
<?php include"header.php" ?>

<section id="hero" class="hero hero-3">
<div id="hero-slider" class="hero-slider">

<div class="slide bg-overlay">
<div class="bg-section">
<img src="assets/images/sliders/4.jpg" alt="Background" />
</div>
<div class="container vertical-center">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
<div class="slide-content">
<div class="slide-heading"> The Best Theme For Auto Shops </div>
<div class="slide-title">
<h2>Say Hello To <span class="color-theme">Car Shop !</span></h2>
</div>
<div class="slide-desc"> Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
</div>
</div>

</div>

</div>

</div>


<div class="slide bg-overlay">
<div class="bg-section">
<img src="assets/images/sliders/1.jpg" alt="Background" />
</div>
<div class="container vertical-center">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
<div class="slide-content">
<div class="slide-icon">
<i class="icon icon-Settings"></i>
</div>
<div class="slide-heading"> The Best Theme For Auto Shops </div>
<div class="slide-title">
<h2>Say Hello To <span class="color-theme">Car Shop !</span></h2>
</div>
<div class="slide-desc"> Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
<div class="slide-action">
<a class="btn btn-primary" href="#">Check It Now</a>
<a class="btn btn-primary btn-white" href="#">Purchase Now</a>
</div>
</div>
</div>

</div>

</div>

</div>


<div class="slide bg-overlay">
<div class="bg-section">
<img src="assets/images/sliders/7.jpg" alt="Background" />
</div>
<div class="container vertical-center">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
<div class="slide-content">
<div class="slide-heading"> The Best Theme For Auto Shops </div>
<div class="slide-title">
<h2>Say Hello To <span class="color-theme">Car Shop !</span></h2>
</div>
<div class="slide-desc"> Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres. </div>
<div class="slide-action">
<a class="btn btn-primary" href="#">Check It Now</a>
</div>
</div>
</div>

</div>

</div>

</div>

</div>

</section>


<section id="shopgrid" class="shop shop-grid">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="product-num pull-left pull-none-xs">
</div>

</div>

<div class="row">
                <?php
// connect to database
$con = mysqli_connect('localhost','root','mysql');
mysqli_select_db($con, 'projet_voiture');

// define how many results you want per page
$results_per_page = 4;

// find out the number of results stored in database
$sql='SELECT * FROM produit';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT * FROM produit LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {
  echo '
<div class="col-xs-12 col-sm-6 col-md-3 product">
<div class="product-img">
<img src="../Admin/'.$row['image'].'" alt="Product" />
<div class="product-hover">
<div class="product-action">
<a class="btn btn-primary" href="AjouterPanier.php?id='. $row['id'].'&prix='.$row['prix'].'">Add To Cart</a>
<a class="btn btn-primary" href="Produit.php?id='.$row['id'].'">Item Details</a>
</div>
</div>

</div>

<div class="product-bio">
<div class="prodcut-cat">
<a href="#">'.$row['informations'].'</a>
</div>

<div class="prodcut-title">
<h3>
<a href="#">'.$row['nom'].'</a>
</h3>
</div>

<div class="product-price">
<span class="symbole"></span><span>'.$row['prix'].' TND</span>
</div>

</div>

</div>';
}
?>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<ul class="pagination">
						<?php 
						        // display the links to the pages
						for ($page=1;$page<=$number_of_pages;$page++) {
							if($page==$_GET['page'])
						  echo '<li class="active">
								<a href="index.php?page=' . $page . '" class="active" >' . $page . '</a> 
								</li>';
						else
						  echo '<li>
						<a href="index.php?page=' . $page . '" >' . $page . '</a>
						</li>';
						}
						?>    
</ul>
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

<!-- Mirrored from demo.zytheme.com/autoshop/home-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:12 GMT -->
</html>