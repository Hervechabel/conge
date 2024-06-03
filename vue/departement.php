<?php
include("entete.php");

if(!empty($_GET['id']))
{
  $produit1 = getProduit($_GET['id']);
}


?>

       <div class="home-content">
             <div class="overview-boxes">
               <div class="box" style="width: 300px; height:550px " >
                    <form action="<?= !empty($_GET['id']) ? "../model/modifieDepartement.php":
                      "../model/ajoutDepartement.php" ?>" method="post">
                        


                        <div class="mb-3">  
                                       
                                       <input  type="text" value="<?= !empty($_GET['id']) ? $produit1['nom_departement']: ""?>"
                                        class="form-control w-50" id="exampleInputPassword1" name="departement" placeholder="departement" ><br><br>
                             
                             


                                        <input value="<?= !empty($_GET['id']) ? $produit1['id']: ""?>"
                                type="hidden" id="id" name="id" >
                             
                                    </div>
                     

                               <div class="mb-3">  
                                       
                                          <input  type="text" value="<?= !empty($_GET['id']) ? $produit1['adresse']: ""?>"
                                           class="form-control w-50" id="exampleInputPassword1" name="adresse" placeholder="adresse" ><br><br>
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
            <th>adresse</th>
           
           
            <th>action</th>
          
          </tr>

         <?php
               $produit1 =getProduit();
               if(!empty($produit1) && is_array($produit1)) {
                        foreach($produit1 as $key=>$value){
                          ?>
                          <tr>
                            <td><?= $value['nom_departement']?></td>
                            <td><?= $value['adresse']?></td>
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
