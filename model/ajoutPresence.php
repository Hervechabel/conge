<?php  
include ("connexion.php"); 

!empty($_POST["departement"]);


  


        $sql="INSERT INTO presence (id_employe,heure_rentree) values(?,?)";
        $req=$con->prepare($sql);
        $req->execute(array(
           
        $_SESSION['id']

       
        
    ));

    if($req->rowCount()!= 0){
        $_SESSION['message']= "Votre Demende a éte envoyer avec succès";
        
    } 
    else {
        $_SESSION['message']['text']="Erreur d' enregistrement d'employe";
        $_SESSION['message']['type']= "danger";
    
    }
    
   
  
   header('Location:../vue/home.php');
      
?>

