<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_css.css">
    <link rel="stylesheet" href="../css/main_content-css.css">
    <link rel="stylesheet" href="../css/login_signup-css.css">
    <link rel="stylesheet" href="../css/privacy_css.css">
    <title>Gearbox</title>
</head>


<body>
    <header class="nav-bar">
      <!------------------navigation-------------------------->
            <div class="brand_responsive">
              <!-- <img src="./img/header/logo.png" alt="logo"> -->
            <a href="../index.php">Gearbox</a>
            
            <nav class="main-nav">
                <div class="hover">
                <div class="main-nav-burger">
                    <span class="burger-img"></span>
                    <span class="burger-img"></span>
                    <span class="burger-img"></span>
                </div>
                <div class="main-nav-links">
                    <div class="arrow"></div>
                    <ul class="dropdown-menu">
                    <?php
                    
                    if (isset($_SESSION['userId'])) {
                      require '../php/dbh.php'; 
                     $id = $_SESSION['userId'];  
                      $sql = "SELECT prenomUsers FROM users where idUsers='$id'";
                      $result = mysqli_query($conn, $sql);
                      $row = $result->fetch_assoc();
                      echo '<li> <a href="profile_users_infos.php" class="Username_layout" > <img src="../img/header/user.png" alt="logo" id="user-logo" >'.$row['prenomUsers'].'</a> </li>';
                  }
                  else{
                      echo'<li> <a href="../loginpage.php" class="B-signupv2" >SE CONNECTER</a> </li>';
                  }
                    
                    ?> 
                        
                        <li> <a href="../prodpc_page.php" class="link_cat">Pc</a> </li>
                        <li> <a href="../prodportable_page.php" class="link_cat">Portable</a> </li>
                        <li> <a href="../prodimprimante_page.php" class="link_cat">Imprimante</a> </li>
                        <li> <a href="../prodaccessoire_page.php" class="link_cat">Accessoire</a> </li>
                        <?php
                         if (isset($_SESSION['userId'])) {
                           echo '<li> <form action="../php/logout-php.php" method="post"><button class="logout_buttonv2" >Se deconnecter</button> </form> </li>';
                         }
                        ?>
                        
                      </ul>
                     
                </div>
                </div>
                <div class="main-nav-brand">
                     <!-- <img src="./img/header/logo.png" alt="logo"> -->
                     <a href="../index.php">Gearbox</a>
                </div>
                <div class="main-nav-search" >
                <div class="search-box">
                        <input class="search-txt" type="text" autocomplete="off" name="search_txt" placeholder="Type to Search">
                        <a href="#" class="search-btn"> &#9906;</a>
                        <div class="result"></div>
                    </div>
                </div>
                <div>
                <div class="main-nav-signup">
                  
                    <?php
                     
                    if (isset($_SESSION['userId'])) {
                      require '../php/dbh.php'; 
                     $id = $_SESSION['userId'];  
                      $sql = "SELECT prenomUsers FROM users where idUsers='$id'";
                      $result = mysqli_query($conn, $sql);
                      $row = $result->fetch_assoc();
                      echo '<div class="profile"><a href="#"><img src="../img/header/user.png" alt="logo" id="user-logo" >'.$row['prenomUsers'].'</a></div>';
                  }
                  else{
                      echo'<div class="signup"><a href="#">Compte</a></div>';
                  }
                  ?> 
                    
                    <div class="main-signup-links">
                        <div class="arrow2"></div>
                        <ul class="dropdown-signup">
                             <?php
                            if (isset($_SESSION['userId'])) {
                                echo'<li > <a href="../html_user_info_page/profile_users_infos.php" id="B-signup">Mon compte</a> </li> 
                                <li > <a href="#" >OU</a> </li>
                                <li > <form action="../php/logout-php.php" method="post"><button class="logout_button" >Se deconnecter</button> </form></li>';
                            }
                            else{
                                echo'<li > <a href="../loginpage.php" id="B-signup">SE CONNECTER</a> </li> 
                                <li > <a href="#" >OU</a> </li>
                                <li > <a href="../signuppage.php" id="C-account">CREER UN COMPTE</a> </li>';
                            }
                            ?>
                          </ul>
                        <div id="line"></div>
                        <div id="line2"></div>
                         
                    </div>
 
                </div>
            </div>
            <div class="main-nav-cart">
                  <?php
                  
                    if (!isset( $_SESSION['nbr_prod'])) {
                      echo '<a href="../cart_page.php"><img src="../img/header/cart.svg" alt="cart"> <span id="cart_nbr">0</span> <p>Panier</p> </a>';
                    }else {
                        echo '<a href="../cart_page.php"><img src="../img/header/cart.svg" alt="cart"> <span id="cart_nbr">'. $_SESSION['nbr_prod'].'</span> <p>Panier</p> </a>';
                        
                      }?> 
            
            </div>
            </nav>
    </header>