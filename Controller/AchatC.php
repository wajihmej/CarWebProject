<?php 
require_once "../config.php";
class AchatC{  
    
    function rechercherTicket($str){
        $sql="select * from Achat where id_prod like '%".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }


public function affichernomprenom($id){
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

public function afficherAchats(){
    $sql="SELECT * From Achat";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherImageProductAchats($id){

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

public function afficherAchatWithID($id){


    $sql="SELECT * From Achat where id_utilisateur = $id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}
public function triachat($id){


    $sql="SELECT * From Achat where id_utilisateur = $id order by prix_total";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}


    function modifierAchat($Achat,$id){
        $sql="UPDATE Achat SET id_utilisateur=:id_utilisateur,id_prod=:id_prod,quatite=:quatite,prix_total=:prix_total WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->sAchattribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $id_utilisateur=$Achat->getId_utilisateur();
        $id_prod=$Achat->getId_prod();
        $quatite=$Achat->getQuatite();
        $prix_total=$Achat->getPrix_total();
        $datas = array(':id'=>$id, ':id_utilisateur'=>$id_utilisateur,':id_prod'=>$id_prod,':quatite'=>$quatite);
        $req->bindValue(':id',$id);
        $req->bindValue(':id_utilisateur',$id_utilisateur);
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

public function ajouterAchat($Achat){
    $sql="insert into Achat(id_utilisateur,id_prod,quatite,prix_total) values(:id_utilisateur,:id_prod,:quatite,:prix_total)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $id_utilisateur=$Achat->getId_utilisateur();
        $id_prod=$Achat->getId_prod();
        $quatite=$Achat->getQuatite();
        $prix_total=$Achat->getPrix_total();
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
public function supprimerAchat($id){
    $sql="DELETE FROM Achat where id=:id";
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
public function supprimerAchatClient($id){
    $sql="DELETE FROM Achat where id_utilisateur=:id";
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

function lastid(){


        $sql="SELECT MAX(ID) FROM achat";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function countAchat($id){


        $sql="SELECT * from Achat where id_utilisateur= $id";
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

function countPrixTotalAchat($id){


        $sql="SELECT prix_total from Achat where id_utilisateur= $id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
function countAchatAdmin(){


    $sql="SELECT * from Achat ";
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

function countPrixTotalAchatAdmin(){


    $sql="SELECT prix_total from Achat";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;

    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
}
?>