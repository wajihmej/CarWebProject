<?php 

include "../Model/client.php";
include "../Controller/ClientC.php";


if($_POST['inscri'])
{
if( isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['tel']) and isset($_POST['adresse'])){
$client=new Client($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'],$_POST['tel'],$_POST['adresse'],$_POST['sexe'],$_POST['dateannif']);

    $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];

    $folder = "./images/client/".$filename ;
    move_uploaded_file($tempname, $folder);

//Partie3
$clientC = new ClientC();
$clientC->ajouterclients($client);
$clientC->ajouterClientimg($_POST['email'],$folder);

echo "<script type='text/javascript'>";
echo "alert('Vous êtes inscrit ! Connectez-vous !');
window.location.href='Connexion.php';";
echo "</script>";
    
}else{
    echo "vérifieer les champs";
    die();
}
//*/
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/autoshop/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:21 GMT -->
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

<title>Autoshop | Inscription</title>
</head>
<body>

<div id="wrapper" class="wrapper clearfix">
<?php include 'header.php'; ?>


<div class="clearfix mb-150"></div>

<section class="register">
<div class="container">
<div class="row">
<div class="col-xs-12  col-sm-12  col-md-12">
<div class="text-center">
</div>
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<p>Hello</p>
<h6>Register Form</h6>
<div class="register-form">
<form class="mb-0" method="post" enctype="multipart/form-data" id="form_client">
<div class="form-group">
<input type="text" class="form-control" id="nom" name="nom" placeholder="Name">
</div>
<div class="form-group">
<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Last Name">
</div>
<div class="form-group">
<input type="text" class="form-control" id="email" name="email" placeholder="Email">
</div>
<div class="form-group">
<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password">
</div>
<div class="form-group">
<input type="Number" class="form-control" id="tel" name="tel" placeholder="Number">
</div>
<div class="form-group">
<input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
</div>
<div class="form-group">
<input type="date" class="form-control" id="dateannif" name="dateannif" >
</div>
<div class="form-group">
<p>Sexe</p>
<select class="selectpicker" name="sexe">
<option value="">Selectionner un type</option>
<option value="Homme">Homme</option>
<option value="Femme">Femme</option>
</select>
</div>
<div class="form-group">
<p>Select image to upload:</p>
<input class="form-control" input type="file" name="image" >
</div>

<div class="form-group">
<input class="btn btn-primary btn-block mt-30" type="submit" value="Register" name="inscri" id="inscri">
</div>
</form>
<div class="form-links text-center">
<a href="Connexion.php">Have an account? Login Here</a>
</div>
</div>
</div>
</div>

</div>
</div>

</div>

</div>

</section>

<div class="clearfix mb-150"></div>

<?php include 'footer.php'; ?>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/functions.js"></script>
<script src="js/Client.js"></script>

</body>

<!-- Mirrored from demo.zytheme.com/autoshop/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:21 GMT -->
</html>