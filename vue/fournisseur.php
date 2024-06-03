<?php
include("entete.php");

if(!isset($_SESSION['username']))
{
  header("location:login.php");
  exit();
 }


if(!empty($_GET['id']))
{
  $client1 = getFournisseur($_GET['id']);
}


?>


<div class="home-content">
             <div class="overview-boxes">
               <div class="box">
                    <form action="<?= !empty($_GET['id']) ? "../model/modifieFournisseur.php":"../model/ajoutFournisseur.php" ?>" method="post">
                         <div class="mb-4">
                               <input  value="<?= !empty($_GET['id']) ? $client1['nom']: ""?>"
                                type="text" class="form-control  font-weight-bold" 
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nom" placeholder="Nom" required><br><br>
                                <input value="<?= !empty($_GET['id']) ? $client1['id']: ""?>"
                                type="hidden" id="id" name="id" >
                         </div>
                         <div class="mb-4">
                                <input value="<?= !empty($_GET['id']) ? $client1['prenom']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="prenom" placeholder="Prenom" required><br><br>
                           </div>
                         <div class="mb-4">
                                <input value="<?= !empty($_GET['id']) ? $client1['adresse']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="adresse" placeholder="Adresse"required><br><br>
                           </div>
                            
                         <div class="mb-4">
                                <input value="<?= !empty($_GET['id']) ? $client1['telephone']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="phone" placeholder="Téléphone" required"><br><br>
                            
                         </div>

                         <button type="submit" class="btn btn-primary font-weight-bold" name="btn">
                                            Enregistrer</button>   
                   
            
        <?php
          if(!empty($_SESSION['message']['text'])) {
             ?>
           <div class="alert <?=$_SESSION['message']['type']?>">
           <?=$_SESSION['message']['text']?>
  </div>


       <?php
           } 
       ?>
                   
            
       
      
                   
                   
      </form>
    </div>
           
      <div class="box"   style="width: 600px; height: 300px; text-align: center; " >
        <table class="mtable">
        
          <tr>
            <th>Nom.</th>
            <th>Prénom</th>
            <th>adresse</th>
            <th>Téléphone</th>
            <th>Action</th>
          </tr>

         <?php
               $client =getFournisseur();
               if(!empty($client) && is_array($client)) {
                        foreach($client as $key=>$value){
                          ?>
                          <tr>
                            <td><?= $value['nom']?></td>
                            <td><?= $value['prenom']?></td>
                            <td><?= $value['adresse']?></td>
                            <td><?= $value['telephone']?></td>

                            <td><a href="?id=<?= $value['id']?>"><i class='bx bx-edit-alt'></i></a></td>
                      <td><a href=""</a> <th>    </th>  </td>

                            
                              <?php
                        }
                       
               }
               ?>



        
          
        </table>
      </div>

      

      

</section>

<?php
include("pied.php");
?>