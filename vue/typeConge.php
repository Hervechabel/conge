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
$sql = "SELECT * FROM type_conge";
$result = mysqli_query($link, $sql);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);




if(!empty($_GET['id']))
{
  $type = getTypeconge($_GET['id']);
}


?>

       <div class="home-content">
             <div class="overview-boxes">
               <div class="box" style="width: 300px; height:550px " >
                    <form action="<?= !empty($_GET['id']) ? "../model/modifieTypeconge.php":
                      "../model/ajoutTypeconge.php" ?>" method="post">
                        


                         <div class="mb-3">  
                                       
                                          <input  type="text" value="<?= !empty($_GET['id']) ? $type['nom']: ""?>"
                                           class="form-control w-50" id="exampleInputPassword1" name="nom" placeholder="nom" ><br><br>
                                </div>

                                <div class="mb-3">  
                                       
                                       <input  type="text" value="<?= !empty($_GET['id']) ? $type['duree']: ""?>"
                                        class="form-control w-50" id="exampleInputPassword1" name="duree" placeholder="duree" ><br><br>
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
            <th>nom</th>
            <th>duree</th>
           
           
            <th>action</th>
          
          </tr>

         <?php
               $type =getTypeconge();
               if(!empty($type) && is_array($type)) {
                        foreach($type as $key=>$value){
                          ?>
                          <tr>
                            <td><?= $value['nom']?></td>
                            <td><?= $value['duree']?></td>
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
