<?php
session_start();


include  "../Controller/AchatC.php";
include  "../Model/Achat.php";


$achatC= new AchatC();
$liste=$achatC->afficherAchatWithID($_SESSION['idclient']);
$resultc=$achatC->countAchat($_SESSION['idclient']);
$prixtot=$achatC->countPrixTotalAchat($_SESSION['idclient']);
$sum = 0;
foreach($prixtot as $row){
   $score = $row['prix_total'];
   $sum += (int)$score;
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
	                <div class="list-group">
                    <h3>Tri</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                <form>
                            <p class="checkout-one__checkbox">
                                <input type="checkbox" name="radio-group" id="myCheckbox">
                                <label for="myCheckbox">Prix</label>
                            </p>
                </form>
                    <form class="form-inline" method="POST" action="pdfAchat.php" >
                      <fieldset >
                      <div class="form-group">  
                  <input type="submit" name="telecharger pdf" value="telecharger pdf" class="btn btn-info">
                </div>
                      </fieldset>
                    </form>
                    </div>
                </div>

<thead>
<tr class="cart-product">
<th class="cart-product-item">Product</th>
<th class="cart-product-price">Price</th>
<th class="cart-product-quantity">Quantity</th>
<th class="cart-product-total">Total</th>
</tr>
</thead>
<tbody  id="tableau">

</tbody>
</table>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type = "text/javascript">

        $(document).ready(function(){

            $('#myCheckbox').click(function() {
            var checked = $(this).is(':checked');

            $.ajax({
                type: "POST",
                url:"filter_data_achat.php",
                data: { str : checked },
                success: function(data) {
                $('#tableau').html(data);
                }
                });
            });

            if ($('#myCheckbox').not(':checked').length) {
                // do stuff for not selected
            var checked = $(this).is(':checked');

            $.ajax({
                type: "POST",
                url:"filter_data_achat.php",
                data: { str : checked },
                success: function(data) {
                $('#tableau').html(data);
                }
                });            
            }


        });
    </script>
</body>

<!-- Mirrored from demo.zytheme.com/autoshop/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:16 GMT -->
</html>
