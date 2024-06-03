<?php
include ("connexion.php");
if(
      !empty($_POST["departement"])
      &&!empty($_POST["adresse"]) 
    
) {
    $sql="UPDATE departement SET nom_departement=?,adresse=? WHERE id=?";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["departement"],
        $_POST["adresse"],
        $_POST["id"]
      
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='departement Modifié avec succès';
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
   header('Location:../vue/departement.php');
      
?>