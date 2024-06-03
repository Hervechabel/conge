<?php
include("entete.php");

$server="localhost";
$user="root";
$mdp="";
$bd="conge";

$link =  new mysqli($server,$user,$mdp,$bd);
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);

} 
$sql = "SELECT * FROM departement";
$sql1="SELECT * FROM poste";

$result = mysqli_query($link, $sql);
$result1 = mysqli_query($link, $sql1);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);
$pruducts_list1 = $result1->fetch_all(MYSQLI_ASSOC);




if(!empty($_GET['id']))
{
  $poste1 = getPoste($_GET['id']);
}


if(!empty($_GET['id']))
{
  $poste2 = getPoste($_GET['id']);
}


?>
<div class="home-content">
             <div class="overview-boxes">
              
                    <form action="<?= !empty($_GET['id']) ? "../model/modifieEmploye.php":"../model/ajoutEmploye.php" ?>" method="post">
                         
                  <div  style="display: flex;  " >
                                   
                                   <input  value="<?= !empty($_GET['id_departement']) ?$poste1['id']: ""?>"
                                   type="hidden" id="id_departement" name="id_departement" >
                            
                            
                            <select class="form-control font-weight-bold " id="nom_departement" aria-describedby=
                            "emailHelp"  name="nom_departement" >
                            >
                            <option value="<?= !empty($_GET['id']) ? $poste1['id_departement']: ""?>"disabled selected hidden>Departement</option>
                            
                            <?php foreach($pruducts_list as $poste) :?>
                           <option value="<?= $poste['id'] ?>"><?php echo($poste['nom_departement'] );
                          ?>
                            </option>
                            <?php endforeach;?>
                           </select><br><br>
                           
                    


                         
           
                                   
                                   <input  value="<?= !empty($_GET['id_poste']) ?$poste2['id']: ""?>"
                                   type="hidden" id="id_departement" name="id_poste" >
                         
                            
                            <select class="form-control font-weight-bold " id="nom_poste" aria-describedby=
                            "emailHelp"  name="nom_poste" >
                            >
                            <option value="<?= !empty($_GET['id']) ? $poste2['id_poste']: ""?>"disabled selected hidden>poste</option>
                            
                            <?php foreach($pruducts_list1 as $poste) :?>
                           <option value="<?= $poste['id'] ?>"><?php echo($poste['nom_poste'] );
                          ?>
                            </option>
                            <?php endforeach;?>
                           </select><br><br>
                        
                            </div>
                                <div style="display: flex;" >
                          
                              
                                      

                             
                    
                  
                               <input style="border-radius: 3px;" value="<?= !empty($_GET['id']) ? $client1['nom']: ""?>"
                                type="text" class="form-control  font-weight-bold" 
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="nom" placeholder="Nom" required>
                                <input value="<?= !empty($_GET['id']) ? $client1['id']: ""?>"
                                type="hidden" id="id" name="id" >
                      
                      
                                <input value="<?= !empty($_GET['id']) ? $client1['prenom']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="prenom" placeholder="Prenom" required><br><br>
                       
                              </div>
                             
                              <div style="display: flex;" >
                          
                                      <input value="<?= !empty($_GET['id']) ? $client1['matricule']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="matricule" placeholder="matricule"required><br><br>
                       

                         
                                <input  value="<?= !empty($_GET['id']) ? $client1['adresse']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="adresse" placeholder="Adresse"required><br><br>
                        </div>
                            
                        <div style="display: flex;" >
                          
                                <input value="<?= !empty($_GET['id']) ? $client1['telephone']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="phone" placeholder="Téléphone" required"><br><br>
                            
                   


                        

                       
                                <input value="<?= !empty($_GET['id']) ? $client1['email']: ""?>"
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                      name="mail" placeholder="email" required"><br><br>
                            
                  


                       </div>

                         
                       

                         <button  type="submit" class="btn btn-primary font-weight-bold" name="btn">
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
      <br>
    
           
      <div class="bo"   style="width: 700px; height: 300px; text-align: center; " >
        <table class="mtable" style="padding-left: 0px;" >
        
          <tr>
            <th>departement</th>
            <th>poste</th>
            <th>matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>adresse</th>
            <th>Téléphone</th>
            <th>email</th>
           
            
            
          
          </tr>

         <?php
               $client =getClient();
               if(!empty($client) && is_array($client)) {
                        foreach($client as $key=>$value){
                          ?>
                          <tr>
                          <td><?= $value['id_departement']?></td>
                          <td><?=$value['id_poste']?></td>
                          <td><?=$value['matricule']?></td>
                            <td><?= $value['nom']?></td>
                            <td><?= $value['prenom']?></td>
                            <td><?= $value['adresse']?></td>
                            <td><?= $value['phone']?></td>
                            <td><?= $value['email']?></td>
                            
                           
                            
                            

                          
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