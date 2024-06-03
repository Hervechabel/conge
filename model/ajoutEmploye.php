<?php  
include ("connexion.php");
if(
      !empty($_POST["nom_departement"])
      &&!empty($_POST["nom_poste"])
      &&!empty($_POST["matricule"])
      &&!empty($_POST["nom"])
      &&!empty($_POST["prenom"])
      && !empty($_POST["adresse"])
      && !empty($_POST["phone"])
      && !empty($_POST["mail"]) 
    
) {

    $sql="INSERT INTO employe (id_departement,id_poste,matricule,nom,prenom,adresse,phone,email) values(?,?,?,?,?,?,?,?)";
    $req=$con->prepare($sql);
    $req->execute(array(
       

        $_POST["nom_departement"],
        $_POST["nom_poste"],
        $_POST["matricule"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["adresse"],
        $_POST["phone"],
        $_POST["mail"],
        
        
  
       
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']['text']='Employe enregistrée avec succès';
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
   header('Location:../vue/employe.php');
      
?>

