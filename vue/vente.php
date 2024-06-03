<?php
include("entete.php");

if(!isset($_SESSION['username']))
{
  header("location:login.php");
  exit();
 }




if(!empty($_GET['id'])){

  $vente =getVente( $_GET['id']);
}

?>
  
<div class="home-content">
             <div class="overview-boxes">
               <div class="box">
                    <form action="<?= !empty($_GET['id']) ? "../model/modifierVente.php":
                      "../model/ajoutVente.php" ?>" method="post">
                    <div class="mb-4">
                         <select class="form-control font-weight-bold " id="client"  name="client" >
                             <option value=""disabled selected hidden>Nom Client</option>
                            <?php
                            $clients = getClient("");
                            if(!empty($clients) && is_array($clients)){
                                  foreach($clients as$key=> $value){
                                    ?>
                                    <option value="<?=$value['id']?>"><?=$value['nom']." ".$value['prenom'] ?>  </option>
                                    <?php
                            }
                        }   ?>     
                         </select><br><br>
                           </div>
                           <div class="mb-4">
                          <select onchange="calculTotal()" class="form-control font-weight-bold " id="product_id"  name="produit" >
                             <option value=""disabled selected hidden>Produit</option>
                            <?php
                            $produits = getProduit("");
                            if(!empty($produits) && is_array($produits)){
                                  foreach($produits as $key=> $value){
                                    ?>
                                    <option data_prix="<?=$values['prix_achat']?>"  value="<?=$value['id']?>"><?=$value['nom_produit']."-".$value['quantite']." dispo" ?>  </option>
                                    <?php
                            }
                        }
                          
                       ?>  
                         </select><br><br>
                           </div><div class="mb-4">
                                <input  value=""
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="quantite" aria-describedby="emailHelp"
                                      name="quantite" placeholder="Quantite"required><br><br>
                           </div>
                            
                           <div class="mb-4">
                                <input value=""
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="prix" aria-describedby="emailHelp"
                                name="prixt" placeholder="Prix" readonly><br><br>
                              </div>
                           
                         <div class="mb-4">
                                <input value=""
                                type="text" class="form-control font-weight-bold w-50" 
                                 id="prixt" aria-describedby="emailHelp"
                                name="prix" placeholder="Prix Total" required readonly onclick="calculTotal()"><br><br>
                              </div>

                         <div class="mb-4">
                         <input value="" 
                         type="text" name="datev" placeholder="Date d'achat" 
                         onfocus="(this.type='date')" 
                         onblur="if(this.value==''){this.type='text'}">
                            
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
           
                              </div>

            
                          </form>
    
           
      <div class="box" style="width: 650px; height: 400px; text-align: center; " >
        <table class="mtable">
        
          <tr>
            <th>Client</th>
            <th>Produit</th>
            <th>Quantite</th>
            <th>Prix à Payer</th>
            <th>Date de vente</th>
            <th>Action</th>
            
          </tr>

          <?php
                $vente = getVente();
              if(!empty($vente) && is_array($vente))
                {
                   foreach($vente as $key=>$values){
                    ?>
                    <tr>
                      <td><?=$values['nom']." ".$values['prenom']?></td>
                      <td><?=$values['nom_produit']?></td>
                      <td><?=$values['quantite']?></td>
                      <td><?=$values['total']?></td>
                      <td><?=$values['date_vente']?></td>
                      <td><a href="recuVente.php?id=<?=$values['id']?>">
                      <i class='bx bxs-printer'></i>
                    </a>
                    <a onclick="annulerVente(<?=$values['id']?>,<?=$values['idProduit']?>,<?=$values['quantite']?>)" style=" color:brown ">
                    <i class='bx bx-stop-circle'></i>

                    </a>
                  
                  </td>

              
                    
                     
                    </tr>
                  
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script>





        function calculTotal() {
            var prix = parseFloat(document.getElementById("prix").value);
            var quantite = parseFloat(document.getElementById("quantite").value);

            var total = prix * quantite;
            document.getElementById("prixt").value = total;
        }
 


function annulerVente(idVente,idProduit,quantite){
  if(confirm("voulez vous annuler la vente?")){
    window.location.href = "../model/annulerVente.php?id="+idVente+"&id_produit="+idProduit+"&quantite="+quantite;
  }
}







$(document).ready(function(){
            $("#product_id").change(function(){
                var id = $(this).val();
                alert(id);
              $.ajax({
                  type:"GET",  
                  url:"../model/test.php",
                  data:"id="+id,
                  success:function(data){
                      $("#prix").val(data);
                      
                      
                  }
              })
            }) 
        })

</script>