<?php  
include ("connexion.php");
if(
      !empty($_POST["nom_employe"])
      &&!empty($_POST["type_conge"]) 
      && !empty($_POST["date_debut"])
      && !empty($_POST["date_fin"])
     
) {

    $sql="INSERT INTO conge(id_employe,type_conge,date_debut,date_fin) values(?,?,?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       
        $_POST["nom_employe"],
        $_POST["type_conge"],
        $_POST["date_debut"],
        $_POST["date_fin"]
    ));


    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='conge enregistrée avec succès';
        $_SESSION['message']['type']= "succes";
        //echo "<script>alert('Produit enregistrée avec succès');</script>";
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement du conge";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      // echo"";
   }
   header('Location:../vue/conge.php');
      
?>

