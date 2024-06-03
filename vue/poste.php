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
$result = mysqli_query($link, $sql);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);




if(!empty($_GET['id']))
{
  $poste1 = getPoste($_GET['id']);
}


?>

       <div class="home-content">
             <div class="overview-boxes">
               <div class="box" style="width: 300px; height:550px " >
                    <form action="<?= !empty($_GET['id']) ? "../model/modifiePoste.php":
                      "../model/ajoutPoste.php" ?>" method="post">
                        


                         <div class="mb-3">  
                                       
                                          <input  type="text" value="<?= !empty($_GET['id']) ? $poste1['poste']: ""?>"
                                           class="form-control w-50" id="exampleInputPassword1" name="poste" placeholder="poste" ><br><br>
                                </div>

                                <div class="mb-4">  
                                   
                                <input value="<?= !empty($_GET['id_departement']) ?$poste1['id']: ""?>"
                                type="hidden" id="id_departement" name="id_departement" >
                         </div>
                         <div class="mb-4">
                         <select class="form-control font-weight-bold " id="nom_departement" aria-describedby=
                         "emailHelp"  name="nom_departement" >
                         >
                         <option value="<?= !empty($_GET['id']) ? $poste1['id_departement']: ""?>"disabled selected hidden>categorie</option>
                         
                         <?php foreach($pruducts_list as $poste) :?>
                        <option value="<?= $poste['id'] ?>"><?php echo($poste['nom_departement'] );
                       ?>
                         </option>
                         <?php endforeach;?>
                        </select><br><br>
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
           
               <div class="box"   style="width: 700px; height: 300px; text-align: center; " >
        <table class="mtable">
        
          <tr>
            <th>Departement</th>
            <th>poste</th>
           
           
            <th>action</th>
          
          </tr>

         <?php
               $poste1 =getPoste();
               if(!empty($poste1) && is_array($poste1)) {
                        foreach($poste1 as $key=>$value){
                          ?>
                          <tr>
                            <td><?= $value['id_departement']?></td>
                            <td><?= $value['nom_poste']?></td>
                            <td><a href="?id=<?=$value['id']?>">
                                <i class='bx bx-edit-alt'></i></a></td>
                       
                            
                         
                           
                            

                          
                      

                            
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
