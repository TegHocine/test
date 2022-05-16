<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar_css.css">
    <link rel="stylesheet" href="./css/login_signup-css.css">
    <title>login</title>
</head>


<body>
    <header class="nav-bar">
             <!------------------navigation-------------------------->
             <div class="brand_responsive">
              <!-- <img src="./img/header/logo.png" alt="logo"> -->
            <a href="index.php">Gearbox</a>
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
                        <li> <a href="loginpage.php" class="B-signupv2" >SE CONNECTER</a> </li>
                        <li> <a href="./prodpc_page.php" class="link_cat">Pc</a> </li>
                        <li> <a href="./prodportable_page.php" class="link_cat">Portable</a> </li>
                        <li> <a href="./prodimprimante_page.php" class="link_cat">Imprimante</a> </li>
                        <li> <a href="./prodaccessoire_page.php" class="link_cat">Accessoire</a> </li>
                        <li > <a href="signuppage.php" class="B-signupv3" >CREER UN COMPTE</a> </li>
                      </ul>
                     
                </div>
                </div>
                <div class="main-nav-brand">
                     <!-- <img src="./img/header/logo.png" alt="logo"> -->
                     <a href="index.php">Gearbox</a>
                </div>
                <div class="main-nav-search" >
                    <div class="search-box">
                        <input class="search-txt" type="text" class="" placeholder="Type to Search">
                        <a href="" class="search-btn">
                        &#9906;
                        </a>
                    </div>
                </div>
                <div class="main-nav-signup">
                    <div class="signup"><a href="#">Compte</a></div>
                    <div class="main-signup-links">
                        <div class="arrow2"></div>
                        <ul class="dropdown-signup">
                            
                            <li > <a href="loginpage.php" id="B-signup">SE CONNECTER</a> </li>
                            <li > <a href="#" >OU</a> </li>
                            <li > <a href="signuppage.php" id="C-account">CREER UN COMPTE</a> </li>
                          
                          </ul>
                        <div id="line"></div>
                        <div id="line2"></div>
                         
                    </div>
 
                </div>
                <div class="main-nav-cart">
                <a href="./cart_page.php"><img src="./img/header/cart.svg" alt="cart"> <span id="cart_nbr">0</span> <p>Panier</p> </a>
                </div>
            </nav>
    </header>
    <main class="main_main">
    <div class="signin-page">
        <h1 class="signin-title">Se connecter</h1>
        <?php
            
        if (isset($_GET['error'])) {
                  if ($_GET['error'] == "nouser") {
                    echo '<p class="errormsg">Impossible de trouver un compte correspondant à cette adresse e-mail</p>';
                  } else if ($_GET['error'] == "emptyfields") {
                    echo '<p class="errormsg">Veuillez remplir tous les champs</p>';
                  } else if ($_GET['error'] == "wrongpwd") {
                    echo '<p class="errormsg"> Verifier votre mot de passe</p>';
                  }elseif ($_GET['error'] == "needconn") {
                    echo '<p class="errormsg">Vous devez etre connecté pour acceder au panier</p>';
                  } 
              }

            ?>
        <div>
            <form class="main-signin-form" action="./php/login-php.php" method="post">
                <input type="Email" name="mailuid" placeholder="Email" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <div class="redirect"><a  href="signuppage.php">Créer un compte</a></div>
                <div class="main-signup-action">
                    <button class="main-signin-button" type="submit" name="login-submit">SE CONNECTER</button><br>
                </div>
            </form>
            
        </div>
    </div>
    </main>
    <?php require './footer_bar_doc.php';?>