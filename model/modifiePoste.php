<?php
include ("connexion.php");
if(
      !empty($_POST["nom_departement"])
      &&!empty($_POST["poste"]) 
    
) {
    $sql="UPDATE poste SET id_departement=?,nom_poste=? WHERE id=?";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom_departement"],
        $_POST["poste"],
        $_POST["id"]
      
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='postet Modifié avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur de modification";
        $_SESSION['message']['type']= "warning";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/poste.php');
      
?>