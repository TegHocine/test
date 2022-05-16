<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar_css.css">
    <link rel="stylesheet" href="./css/login_signup-css.css">
    <title>Register</title>
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
        <h1 class="signin-title">Créer un compte</h1>
        <div>
            <?php
            
        if (isset($_GET['error'])) {
                  if ($_GET['error'] == "invalidmail") {
                    echo '<p class="errormsg">Votre email n est pas valide</p>';
                  } else if ($_GET['error'] == "emptyfields") {
                    echo '<p class="errormsg">Veuillez remplir tous les champs</p>';
                  } else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class="errormsg">Vous mot de passe ne sont pas identique</p>';
                  }else if ($_GET['error'] == "takenemail") {
                    echo '<p class="errormsg">cet  adresse email est déjà pris</p>';
                  }
              }

            ?>

         
            <form class="main-signin-form" action="./php/register.php" method="post">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prenom" required>
                <input type="Email" name="email" placeholder="Email" required>
                <input type="password" name="pwd" placeholder="Mot de passer" required>
                <input type="password" name="pwd-repeat" placeholder="Confirmer mot de passe" required>
                <div class="redirect"><a  href="loginpage.php">Se connecter</a></div>
                <div class="main-signup-action">
                    <button class="main-signin-button" type="submit" name="signup-submit">CREER VOTRE COMPTE</button><br>
                </div>
            </form>
            
        </div>
    </div>
    </main>
    <?php require './footer_bar_doc.php';?>