<?php


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=lion", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully :";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



if(isset($_POST['password'])){
    $pass = $_POST['password'];
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    die($passHash) ;
}

?>

<form action="" method="post">
    
<input type="text" name="password" placeholder="password">
</form>
