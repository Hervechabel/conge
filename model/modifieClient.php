<?php
include ("connexion.php");
if(
      !empty($_POST["nom"])
      &&!empty($_POST["prenom"]) 
      && !empty($_POST["adresse"])
      && !empty($_POST["phone"])
) {
    $sql="UPDATE client SET nom=?,prenom=?,adresse=?,telephone=? WHERE id=?";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["adresse"],
        $_POST["phone"],
        $_POST["id"] 
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='Client a été Modifié avec succès';
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
   header('Location:../vue/client.php');
      
?>