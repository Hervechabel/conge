<?php
/*include("connexion.php");
$id=@$_GET['id'];
$sql = "SELECT * FROM produit WHERE id ='$id'";
$req = $GLOBALS['con']->prepare($sql);
$out='';

while($row = mysqli_fetch_array($req))
{
  $out = $row['Prix_achat'];
}   
echo $out; 
//$link->close(); 
////////////////////////////////////////////////////////////////////////////////////////////////////
/*
$id=@$_GET['id'];
$sql = "SELECT * FROM produit WHERE id ='$id'";
$result = mysqli_query($link, $sql);
$out='';

while($row = mysqli_fetch_array($result))
{
  $out = $row['Prix_achat'];
}
echo $out; 
$link->close(); 
*/
/*
 $sql="SELECT * FROM produit ORDER BY id DESC LIMIT 8 "; 
    $req = $GLOBALS['con']->prepare($sql);
    $req->execute();
    return $req->fetchAll();
*/
$server="localhost";
$user="root";
$mdp="";
$db="stock";
 
$link =  new mysqli($server,$user,$mdp,$db);



$id=@$_GET['id'];
$sql = "SELECT * FROM produit WHERE Id ='$id'";
$result = mysqli_query($link, $sql);
$out='';

while($row = mysqli_fetch_array($result))
{
  $out = $row['prix_achat'];
}   
echo $out; 
$link->close(); 

?>