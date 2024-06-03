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
$sql = "SELECT * FROM conge";


$result = mysqli_query($link, $sql);
$pruducts_list = $result->fetch_all(MYSQLI_ASSOC);





if(!empty($_GET['id']))
{
  $conge1 = getConge($_GET['id']);
}




?>
<div class="home-content">
             <div class="overview-boxes">
              
                  
      <br>
    
           
      <div class="box"   style="width: 700px; height: 300px; text-align: center; " >
        <table class="mtable" style="padding-left: 0px;" >
        
          <tr>
            <th>employe</th>
            <th>type conge</th>
            <th>debut</th>
            <th>fin</th>
            <th>motif</th>
            <th>etat</th>
            
            
            
            
          
          </tr>

         <?php
               $conge1 =getConge();
               if(!empty($conge1) && is_array($conge1)) {
                        foreach($conge1 as $key=>$value){
                          ?>
                          <tr>
                          <td><?= $value['id_employe']?></td>
                          <td><?= $value['id_type_conge']?></td>
                          <td><?= $value['date_debut']?></td>
                          <td><?= $value['date_fin']?></td>
                          <td><?= $value['motif']?></td>
                          <td><?= $value['etat']?></td>
                            
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