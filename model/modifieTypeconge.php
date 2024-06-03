<?php
include ("connexion.php");
if(
      !empty($_POST["nom"])
      &&!empty($_POST["duree"]) 
    
) {
    $sql="UPDATE type_conge SET nom=?,duree=? WHERE id=?";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom"],
        $_POST["duree"],
        $_POST["id"]
      
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='type de conge Modifié avec succès';
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
   header('Location:../vue/typeConge.php');
      
?>