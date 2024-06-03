
<?php
include("../model/connexion.php");

if(isset($_POST["valider"])){
    if(!empty($_POST["email"]) && !empty($_POST["matricule"])) {
        
        $username = $_POST["email"];
        $matricule = $_POST["matricule"];
        
        $query = $con->prepare("SELECT id,nom,prenom FROM employe WHERE email = ? AND matricule = ?");
        $query->bindParam(1, $username);
        $query->bindParam(2, $matricule);
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            $_SESSION['nom']=$user['nom'];
                $_SESSION['prenom']=$user['prenom'];
                $_SESSION['id']=$user['id'];
            usleep(2000000);
            header('location: home.php');
            exit();
        } else {
            $message = "Email ou Mot de passe Incorrect";
        }
    }       
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    
    <link rel="stylesheet" href="../public/css/style1.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div  class="wrapper" >
        <form  method="POST" action="">
            <h1>Se connecter</h1>
            <div class="input-box" >
            
                <input type="text" placeholder="email" name="email" required="">
                <i class='bx bx-user'></i>
                
            </div>
            <div class="input-box" >
                <input type="text" placeholder="Matricule" name="matricule" required="">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot" >
                <label><input type="checkbox"> Se souvenir de moi</label>
                <a href="#">Mot de passe oublié?</a>
            </div>
            <button type="submit" class="btn" name="valider">Se connecter</button>
            <div class="register-link" >
                <p>
                    <i style="color: red;"></i>
                
                Pas encore inscrit? <a href="inscription.php">S'inscrire</a></p>
            </div>
           
            
        </form>

    </div>
</body>
</html>