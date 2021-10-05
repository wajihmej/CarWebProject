<?php 
require_once "../config.php";
class ProduitC{

    
    function rechercherTicket($str){
        $sql="select * from Produit where nom like '%".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

public function afficherProduits(){
    $sql="SELECT * From Produit";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherProduitWithID($id){
    $sql="SELECT * From Produit where id=$id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}


            //chya3mel update lil immage ama fil asel yajouti fil path
    function UpdateImgProduitimg($id,$image){
        $sql="UPDATE Produit SET image=:image WHERE id=:id";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':id',$id);
        $req->bindValue(':image',$image);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    function modifierProduit($Produit,$id){
        $sql="UPDATE Produit SET nom=:nom,prix=:prix,informations=:informations WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->sProduittribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $nom=$Produit->getNom();
        $prix=$Produit->getPrix();
        $informations=$Produit->getInformation();
        $datas = array(':id'=>$id, ':nom'=>$nom,':prix'=>$prix,':informations'=>$informations);
        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':informations',$informations);
        
            $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }

public function ajouterProduit($Produit){
    $sql="insert into Produit(nom,prix,image,informations) values(:nom,:prix,:image,:informations)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $nom=$Produit->getNom();
        $prix=$Produit->getPrix();
        $image=$Produit->getImage();
        $informations=$Produit->getInformation();
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':image',$image);
        $req->bindValue(':informations',$informations);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerProduit($id){
    $sql="DELETE FROM Produit where id=:id";
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

    
function countProduitAdmin(){


    $sql="SELECT * from Produit ";
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