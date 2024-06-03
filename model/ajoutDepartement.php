<?php  
include ("connexion.php");
if(
      !empty($_POST["departement"])
      &&!empty($_POST["adresse"])
   
) {

    $sql="INSERT INTO departement (nom_departement,adresse) values(?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["departement"],
        $_POST["adresse"],

       
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='Departement enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement de l'employe";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/departement.php');
      
?>

