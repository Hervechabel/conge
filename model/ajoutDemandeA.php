<?php  
include ("connexion.php");
if(
      !empty($_POST["motif"])
      &&!empty($_POST["datea"])
      
) {

    $sql="INSERT INTO abscence(id_employe,motif,datea) values(?,?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
        $_SESSION['id'],
        $_POST["motif"],
        $_POST["datea"]
        
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']= "Votre Demende a éte envoyer avec succès";
        
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement d'employe";
        $_SESSION['message']['type']= "danger";
    
    }
    
   }
   else {
    $_SESSION['message']['text']='les informations obligatoires non rénseignes';
    $_SESSION['message']['type']= "danger";
      
   }
   header('Location:../vue/home.php');
      
?>

