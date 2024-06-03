<?php
$bdd= new PDO('mysql:host=localhost;dbname=stock;charset=utf8;','root','');
if(isset($_POST['envoi'])){
    if(!empty($_POST['nom']) AND !empty($_POST['password'])){

    }else{
    echo "veuillez remplir tous les champs";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
    <form method="POST" action=""  >
        
        <label for="">nom</label>
        <input type="text" name="nom" id="nom"> <br>
        <label for="">password</label>
        <input type="password" name="password" id="password"><br>

        <button name="envoi" type="submit">valider</button>
    </form>
</body>
</html>