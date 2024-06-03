
<?php
$server="localhost";
$user="root";
$mdp="";
$bd="conge";

$link =  new mysqli($server,$user,$mdp,$bd);
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);

} 
$sql = "SELECT * FROM type_conge";
$result = mysqli_query($link, $sql);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);

include('../model/connexion.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://www.econet.bi/">Econet Wireless</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
        <a href="#">Home</a></li>
        
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Demmande Permission
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li data-toggle="modal" data-target="#myModal1"><a href="#">Abscénce</a></li>

          <li data-toggle="modal" data-target="#myModal2"><a href="#">Retard</a></li>
        </ul>
      </li>
      <li data-toggle="modal" data-target="#myModal"><a href="#">Demande Congé</a></li>
      <ul class="nav navbar-nav navbar-right" style="position: fixed;left:1350px">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo  $_SESSION['prenom']?></a></li>
      </ul>

      <!--demande conge-->
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
           <h4><span class="glyphicon glyphicon-lock"></span>Formulaire de demande de congé</h4>
        </div>
        <div class="modal-body">     <form role="form" action="../model/ajoutDemandeC.php" method="POST">
            <div class="form-group">
            <select class="form-control font-weight-bold " id="categorie" aria-describedby=
                         "emailHelp"  name="departement" >
                         >
                         <option value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"disabled selected hidden>Type de conge</option>
                         
                        <?php foreach($pruducts_list as $produit) :?>
                        <option value="<?= $produit['id'] ?>"><?php echo($produit['nom'] );
                       ?>
                         </option>
                         <?php endforeach;?>
                        </select>
            </div>
            <div class="form-group">
              
              <!--<label for="usrname"><span class="glyphicon glyphicon-user"></span>Date de fin</label>-->
              <input value="" class="form-control" style="width: 570px; height:35px"
                         type="text" name="dated" placeholder="Date de débit" 
                         onfocus="(this.type='date')" 
                         onblur="if(this.value==''){this.type='text'}">
            </div>
            
            <div class="form-group">
              <!--<label for="usrname"><span class="glyphicon glyphicon-user"></span>Date de fin</label>-->
              <input value="" class="form-control" style="width: 570px; height:35px"
                         type="text" name="datef" placeholder="Date de fin" 
                         onfocus="(this.type='date')" 
                         onblur="if(this.value==''){this.type='text'}">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Motif</label>
              <textarea class="form-control" id="username" name="motif"></textarea>
            </div>
            
              <button type="submit" class="btn btn-primary" style="width: 250px" value="valider">Envoyer 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
<!--fin demande conge-->


<!--demande abscence-->

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
           <h4><span class="glyphicon glyphicon-lock"></span>Formulaire de demande d'absence</h4>
        </div>
        <div class="modal-body">   
            <form role="form" action="../model/ajoutDemandeA.php" method="POST">
          
          
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Motif</label>
              <textarea class="form-control" id="username" name="motif"></textarea>
            </div>

            <div class="form-group">
              <!--<label for="usrname"><span class="glyphicon glyphicon-user"></span>Date de fin</label>-->
              <input value="" class="form-control" style="width: 570px; height:35px"
                         type="text" name="datea" placeholder="date" 
                         onfocus="(this.type='date')" 
                         onblur="if(this.value==''){this.type='text'}">
            </div>
            
              <button type="submit" class="btn btn-primary" style="width: 250px" value="valider">Envoyer 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
<!--fin demande abscence-->





<!--demande retard-->

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
           <h4><span class="glyphicon glyphicon-lock"></span>Formulaire de demande de retard</h4>
        </div>
        <div class="modal-body">   
            <form role="form" action="../model/ajoutDemandeR.php" method="POST">
          
          
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Motif</label>
              <textarea class="form-control" id="username" name="motif"></textarea>
            </div>

            <div class="form-group">
              <!--<label for="usrname"><span class="glyphicon glyphicon-user"></span>Date de fin</label>-->
              <input value="" class="form-control" style="width: 570px; height:35px"
                         type="text" name="datea" placeholder="date" 
                         onfocus="(this.type='date')" 
                         onblur="if(this.value==''){this.type='text'}">
            </div>
            
            <div class="form-group">
              <!--<label for="usrname"><span class="glyphicon glyphicon-user"></span>Date de fin</label>-->
              <input value="" class="form-control" style="width: 570px; height:35px"
                         type="text" name="heure" placeholder="heure d'arrive" 
                         onfocus="(this.type='time')" 
                         onblur="if(this.value==''){this.type='text'}">
            </div>


            
            
              <button type="submit" class="btn btn-primary" style="width: 250px" value="valider">Envoyer 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
<!--fin demande retard-->
<li data-toggle="modal" data-target="#myModal3"><a href="#">Presence</a></li>

      




      
<!--confirmer-->

<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
           <h4><span class="glyphicon glyphicon-lock"></span>Appuyer  pour voir si vous etes presentent</h4>
        </div>
        <div class="modal-body">   
            <form role="form" action="../model/ajoutPresence.php" method="POST">
          
          
              <button type="submit" class="btn btn-primary" style="width: 250px" value="valider">Send request
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>

<!--fin confirmer-->

    </ul>
  </div>
</nav>

<MARquee  style="padding-left: 100px; margin: 3em auto; padding-right: 100px; font-size: 25px; color: #000000; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" >Bienvenue dans l'application de gestion des conges</MARquee>

<?php
print "bonjour";
?>

</body>
</html>

