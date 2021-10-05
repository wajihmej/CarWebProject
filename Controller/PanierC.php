<?php 
require_once "../config.php";
class PanierC{

    public function afficher($Panier){
        $id=$Panier->getId();
        $id_utilisateur=$Panier->getid_utilisateur();
        $id_prod=$Panier->getid_prod();
        $quatite=$Panier->getquatite();

}    
    
    function rechercherTicket($str){
        $sql="select * from Panier where id_prod like '%".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }


public function afficherid_prodpreid_prod($id){
    $sql="SELECT * From client where id=$id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherImageProductPaniers($id){

    $sql="SELECT * From produit where id=$id ";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}


public function afficherPaniers(){
    $sql="SELECT * From Panier";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}



public function getRealIpUser(){

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
      {
       return $ip_address = $_SERVER['HTTP_CLIENT_IP'];
      }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
      {
       return $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
    //whether ip is from remote address
    else
      {
       return $ip_address = $_SERVER['REMOTE_ADDR'];
      }
}

public function getPanierItem($id){


    $IPADD=crypt ($this->getRealIpUser(), "ee");

    $sql="SELECT * From Panier where id_utilisateur = '$IPADD' and id_prod=$id ";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}
public function afficherPanierWithID(){


    $IPADD=crypt ($this->getRealIpUser(), "ee");

    $sql="SELECT * From Panier where id_utilisateur = '$IPADD'";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}
public function afficherPanierWithNew($quantite,$id,$prix){



    $sql="UPDATE Panier SET prix_total=:prix_total,quatite=:quantite WHERE id=:id";
    $db=config::getConnexion();
    try{
        $req=$db->prepare($sql);
    
        $req->bindValue(':id',$id);
        $req->bindValue(':prix_total',$prix_total);
        $req->bindValue(':quantite',$quantite);

        
            $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

    function UpdateImgPanierimg($id,$prix_total){
        $sql="UPDATE Panier SET prix_total=:prix_total WHERE id=:id";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':id',$id);
        $req->bindValue(':prix_total',$prix_total);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    function modifierPanier($Panier){
    $IPADD=crypt ($this->getRealIpUser(), "ee");

        $sql="UPDATE Panier SET quatite=:quatite,prix_total=:prix_total WHERE  id_utilisateur = '$IPADD' and id_prod=:id_prod";
        
        $db = config::getConnexion();
        //$db->sPaniertribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $id_utilisateur=$Panier->getId_utilisateur();
        $id_prod=$Panier->getId_prod();
        $quatite=$Panier->getQuatite();
        $prix_total=$Panier->getPrix_total();
        $datas = array(':id_prod'=>$id_prod,':quatite'=>$quatite);
        $req->bindValue(':id_prod',$id_prod);
        $req->bindValue(':quatite',$quatite);
        $req->bindValue(':prix_total',$prix_total);
            $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }

public function ajouterPanier($Panier){
    $sql="insert into Panier(id_utilisateur,id_prod,quatite,prix_total) values(:id_utilisateur,:id_prod,:quatite,:prix_total)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $id_utilisateur=$Panier->getId_utilisateur();
        $id_prod=$Panier->getId_prod();
        $quatite=$Panier->getQuatite();
        $prix_total=$Panier->getPrix_total();
        $req->bindValue(':id_utilisateur',$id_utilisateur);
        $req->bindValue(':id_prod',$id_prod);
        $req->bindValue(':quatite',$quatite);
        $req->bindValue(':prix_total',$prix_total);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerPanier($id){
    $sql="DELETE FROM Panier where id=:id";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}

function countPanier(){
    $IPADD=crypt ($this->getRealIpUser(), "ee");


        $sql="SELECT * from Panier where id_utilisateur= '$IPADD'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        $nombre=$liste->rowCount();
        return $nombre;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

function countPrixTotalPanier(){
        $IPADD=crypt ($this->getRealIpUser(), "ee");


        $sql="SELECT prix_total from Panier where id_utilisateur= '$IPADD' ";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

function CheckProduitPanier($id){
    $IPADD=crypt ($this->getRealIpUser(), "ee");


        $sql="SELECT * from Panier where id_utilisateur= '$IPADD' and id_prod=$id ";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        $nombre=$liste->rowCount();
        return $nombre;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>