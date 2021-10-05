<?php 

include "../Model/client.php";
include "../Controller/ClientC.php";

session_start();

if(isset($_POST['connecter']))
{


   $email=$_POST["email"];
   $clientC = new ClientC();

   $liste=$clientC->recupereremail($email);

   //var_dump($res);
    foreach($liste as $row){
      $mdp=$row['mdp'];
    }
    if (password_verify($_POST["mdp"],$mdp))
    {
    $liste=$clientC->recupereremail($email);
     foreach($liste as $row){
      $id=$row['id'];
      $nom=$row['nom'];
      $prenom=$row['prenom'];
      $email=$row['email'];
      $mdp=$row['mdp'];
      $tel=$row['tel'];
      $adresse=$row['adresse'];
      $sexe=$row['sexe'];
      $date_naiss=$row['date_nais'];
      $image=$row['image'];
    }

         $_SESSION['idclient'] = $id;
         $_SESSION['client'] = $nom ." ".$prenom;
         $_SESSION['clientnom'] = $nom ;
         $_SESSION['clientprenom'] = $prenom;
         $_SESSION['clientemail'] = $email;
         $_SESSION['clienttel'] = $tel;
         $_SESSION['clientadresse'] = $adresse;
         $_SESSION['clientsexe'] = $sexe;
         $_SESSION['clientdate_naiss'] = $date_naiss;
         $_SESSION['clientimage'] = $image;

         header("location: index.php");

    }
   else
   {
    echo "<script type='text/javascript'>";
    echo "alert('Email ou Mot de passe incorect');
    window.location.href='Connexion.php';";
    echo "</script>";
   }
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/autoshop/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:21 GMT -->
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

<title>Autoshop | Connexion</title>
</head>
<body>

<div id="wrapper" class="wrapper clearfix">
<?php include"header.php" ?>



<div class="clearfix mb-150"></div>

<section class="sign">
<div class="container">
<div class="row">
<div class="col-xs-12  col-sm-12  col-md-12">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<p>Welcome Back</p>
<h6>Login Area</h6>
<div class="sign-form">
<form class="mb-0" method="post" enctype="multipart/form-data" >
<div class="form-group">
<input type="text" class="form-control" id="email" placeholder="User Name" name="email">
</div>
<div class="form-group">
<input type="password" class="form-control" id="mdp" placeholder="Password" name="mdp">
</div>
<div class="checkbox pull-left">
<label>
</div>
<div class="pull-right lost-pass">
<a href="#">Forget Password?</a>
</div>
<div class="login-form__bottom">
<input class="btn btn-primary btn-block" type="submit" value="Sign In" name="connecter" id="connecter">
</div>

</form>
<div class="form-links text-center">
<a href="Inscription.php">Create New Account</a>
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

<?php include"footer.php" ?>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/functions.js"></script>
</body>

<!-- Mirrored from demo.zytheme.com/autoshop/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 14:20:21 GMT -->
</html>