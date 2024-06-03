<?php  
include ("connexion.php");
if(
      !empty($_POST["nom_departement"])
      &&!empty($_POST["poste"])
   
) {

    $sql="INSERT INTO poste (id_departement,nom_poste) values(?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom_departement"],
        $_POST["poste"],

       
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='poste enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement du poste";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/poste.php');
      
?>

