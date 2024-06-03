
<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];


    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "stock";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if($conn ->connect_error){
        die("pas connecte :" .$conn ->connect_error);
    }
    $query = "SELECT * FROM connexion WHERE username = '$username' AND password ='$password' ";

$result = $conn -> query($query);

if($result->num_rows == 1){
    header ("location:dashboard.php");
    exit();  
}
else{
    echo "Mot de passe ou nom d'utilisateur incorrect";
    exit();
}

$conn -> close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <div  class="container">
        <h1>Connexion</h1>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="submit" value="Connexion">
        </form>
       


    </div>
</body>
</html>