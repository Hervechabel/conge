<?php  


include("entete.php");



 



?>

<div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commande</div>
              <div class="number">100</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vente</div>
              <div class="number">100</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Produit</div>
              <div class="number">100</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Revenu</div>
              <div class="number">100</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">les employes</div>

            <?php
                $ventes = getLastVente();
            
                ?>
         
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Nom</li>

    
                <?php
                    foreach($ventes as $key =>$value){
                ?>

                <li><a href="#"><?php echo $value['nom'] ?></a></li>
             <?php
              }
              ?>
              </ul>
              <ul class="details">
                <li class="topic">Prenom</li>


                <?php
                    foreach($ventes as $key =>$value){
                ?>

                <li><a href="#"><?php echo $value['prenom'] ?></a></li>
             <?php
              }
              ?>
              </ul>
              <ul class="details">
                <li class="topic">Adresse</li>
                <?php
                    foreach($ventes as $key =>$value){
                ?>

                <li><a href="#"><?php echo $value['adresse'] ?></a></li>
             <?php
              }
              ?>
              </ul>
              <ul class="details">
                <li class="topic">Telephone</li>
                <?php
                    foreach($ventes as $key =>$value){
                ?>

                <li><a href="#"><?php echo number_format($value['phone']) ?></a></li>
             <?php
            
              }
              ?>
              </ul>
            </div>
            
          </div>
          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div>
            <ul class="top-sales-details">

            
            <?php
            $produit = getMostVente();
          foreach($produit as $key =>$value){

              ?>
              <li>
                <a href="#">
                  <!--<img src="images/sunglasses.jpg" alt="">-->
                  <span class="product"><?php echo $value['nom_produit'] ?></span>
                </a>
                <span class="price"><?php echo number_format($value['total'])." FBU " ?></span>
              </li>

                <?php
            }
            ?>
        
            
           
            </ul>
          </div>
        </div>
      </div>
    </section>
    <?php  
include("pied.php");
?>
