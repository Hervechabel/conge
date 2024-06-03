
<?php

include("../model/connexion.php");


if(isset($_POST["valider"])){
    if(!empty($_POST["username"]) AND!empty($_POST["mail"]) AND !empty($_POST["phone"])
     AND !empty($_POST["password"]) AND !empty($_POST["pwd"])){

        $nom = htmlspecialchars($_POST["username"]);
        $mail = htmlspecialchars($_POST["mail"]);
        $telephone= htmlspecialchars($_POST["phone"]);
        $password = htmlspecialchars($_POST["password"]);
        $pwd = htmlspecialchars($_POST["pwd"]);

        $hash = password_hash($password, PASSWORD_DEFAULT);
   
        $hash1 =password_hash( $pwd, PASSWORD_DEFAULT );
        if($password != $pwd){
            $message = "les mot de passe ne sont pas identiques";
        }
        elseif(strlen($_POST['password'] )<8){
            $message = "le mot de passe doit contenir au moins 8 caracteres"; 

        }
        else if(strlen($_POST["username"] )>30){
            $message="votre nom est tres longue";
        }
        else{
            $testmail = $con->prepare("SELECT * FROM users WHERE mail = ?");
                $testmail->execute(array($mail));
                $validermail=$testmail->rowCount();
                if($validermail==0){


         $sql = "INSERT INTO users (username,mail,phone,password)values(?,?,?,?)";
         
         $req=$con->prepare($sql);
         $req->execute(array(
            
             $_POST["username"],
             $_POST["mail"],
             $_POST["phone"],
             $hash,
           
         ));
         if($req->rowCount()> 0){
            usleep(2000000);
            header('Location: login.php');
            echo "<script>alert('l'inscription a ete effectuee avec succes');</script>";
            exit;
         }
         else{
            $message="Email deja utilise";
         }
        }
        }
    } else
    $message = "mot de passe n est pas identique";
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    
    <link rel="stylesheet" href="../public/css/style2.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div  class="wrapper" >
        <form method="POST" action="">
         <a href="./login.php">
                <i style="color: white; font-size:30px" class='bx bx-arrow-back'></i>
                </a>
            <h1>Inscription<ws/h1>
            <div class="input-box" >
            
                <input type="text" placeholder="Nom d'utilisateur" name="username" required="">
                <i class='bx bx-user'></i>
            </div>

        
         <div class="input-box" >
            
            <input type="text" name="mail" placeholder="Email 
            " required="">
            <i class='bx bxs-envelope'></i>
         </div>

         <div class="input-box" >
            
            <input type="text" placeholder="Téléphone" name="phone" required="">
            <i class='bx bx-phone'></i>
         </div>
            <div class="input-box" >
                <input type="password" placeholder="Mot de passe" name="password" required="">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box" >
                <input type="password" placeholder="retaper le mot de passe" name="pwd" required="">
                <i class='bx bxs-lock-alt'></i>
            </div>
          
            <button type="submit" class="btn" name="valider" >S'inscrire</button>

           <p style="color: red;">
            <?php 
            if  (isset($message)){
                echo "$message";
            }
          
         ?>
           </p>
        </form>

    </div>
</body>
</html>