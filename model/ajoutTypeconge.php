<?php  
include ("connexion.php");
if(
      !empty($_POST["nom"])
      &&!empty($_POST["duree"])
   
) {

    $sql="INSERT INTO type_conge (nom,duree) values(?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom"],
        $_POST["duree"],

       
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='type de conge enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement du type de conge";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/typeConge.php');
      
?>

