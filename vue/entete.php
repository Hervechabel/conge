<?php
//session_start();
include_once'../model/function.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>

            <?php
            echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
            ?>
    </title>
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- Boxicons CDN Link -->
    
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>



    <div class="sidebar hidden-print">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">D-CLIC</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class=" <?php echo basename($_SERVER['PHP_SELF'])=="dashboard.php" ? "active" :""?> " >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="employe.php" class=" <?php echo basename($_SERVER['PHP_SELF'])=="employe.php" ? "active" :""?> ">
            <i class="bx bx-user"></i>
            <span class="links_name">Employe</span>
          </a>
        </li>
        <li>
          <a href="conge.php"class=" <?php echo basename($_SERVER['PHP_SELF'])=="conge.php" ? "active" :""?> ">
            <i class="bx bx-box"></i>
            <span class="links_name">Conge</span>
          </a>
        </li>

        <li>
          <a href="departement.php"class=" <?php echo basename($_SERVER['PHP_SELF'])=="departement.php" ? "active" :""?> ">
            <i class="bx bx-box"></i>
            <span class="links_name">Departement</span>
          </a>
        </li>

        <li>
          <a href="#"class=" <?php echo basename($_SERVER['PHP_SELF'])=="abscence.php" ? "active" :""?> ">
          <i class='bx bx-shopping-bag'></i>
            <span class="links_name">Abscence</span>
          </a>
        </li>
        
        <li>
          <a href="#.php"class=" <?php echo basename($_SERVER['PHP_SELF'])=="fournisseur.php" ? "active" :""?> ">
            <i class="bx bx-user"></i>
            <span class="links_name">Justification</span>
          </a>
        </li>
        <li>
          <a href="poste.php"class=" <?php echo basename($_SERVER['PHP_SELF'])=="poste.php" ? "active" :""?> ">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Poste</span>
          </a>
        </li>

        
        <li>
          <a href="typeConge.php"class=" <?php echo basename($_SERVER['PHP_SELF'])=="typeConge.php" ? "active" :""?> ">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Type de conge</span>
          </a>
        </li>
       
       
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
   
        <li class="log_out">
          <a href="deconnexion.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav class="hidden-print">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">
            
          <?php
            echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
            ?>
          </span>
          
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">Komche</span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>
