<?php
session_start();


include  "../Controller/PanierC.php";
include  "../Model/Panier.php";

$panierC= new PanierC();

if (isset($_GET['id'])){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
      $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
  //whether ip is from proxy
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    {
      $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
  //whether ip is from remote address
  else
    {
      $ip_address = $_SERVER['REMOTE_ADDR'];
    }

  $IPADD=crypt ($ip_address, "ee");

    
    if($panierC->CheckProduitPanier($_GET['id'])==0)
    {
      if(isset($_GET['qty']))
      {
        $nouv_prix = $_GET['prix'] * $_GET['qty'];
        $pan=new Panier($IPADD,$_GET['id'],$_GET['qty'],$nouv_prix);
        $panierC->ajouterPanier($pan);  
      }
      else
      {
        $pan=new Panier($IPADD,$_GET['id'],1,$_GET['prix']);
        $panierC->ajouterPanier($pan);  
      }

    }
    else if(isset($_GET['qty']))
    {
      foreach($panierC->getPanierItem($_GET['id']) as $row){
        $quantite=$row['quatite']; 
        $prix_total=$row['prix_total']; 
      }
       $quantite+=$_GET['qty'];
       $nouv_prix = $_GET['prix'] * $_GET['qty'];
       $prix_total+=$nouv_prix;
       $pan=new Panier($IPADD,$_GET['id'],$quantite,$prix_total);
       $panierC->modifierPanier($pan);  
    }
    else
    {
      foreach($panierC->getPanierItem($_GET['id']) as $row){
        $quantite=$row['quatite']; 
        $prix_total=$row['prix_total']; 
      }
       $quantite++;
       $prix_total+=$_GET['prix'];
       $pan=new Panier($IPADD,$_GET['id'],$quantite,$prix_total);
       $panierC->modifierPanier($pan);  
    }
    header('Location: Panier.php');

    
}

?>