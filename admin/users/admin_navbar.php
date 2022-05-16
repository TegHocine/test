<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_css/admin_css.css">
    <link rel="stylesheet" href="../admin_css/admin_table_css.css">
    <title>Admin</title>
</head>
<body>
    <header class="nav-bar">
        <!------------------navigation-------------------------->    
           <div class="main-nav-brand">
                <a href="users_index.php">Gearbox</a>
           </div>
            <div class="button_cont">
                <div class="signup">
                <?php
                  if (isset($_SESSION['adminId'])) {
                    echo '<a href="#"><img src="../img/user-logo/user.png" alt="logo" id="user-logo" >'.$_SESSION['adminPrenom'].'</a>';
                }
                    ?>
                    
                </div>
                
                <?php
                if (isset($_SESSION['adminId'])) {
                                echo' <div class="logout_cont">
                                <form action="../php/logout-php.php" methode="post"><button class="logout_button" >Se deconnecter</button></form>
                              </div> ';
                            }?>
                
            </div>             
     </header>
     <main class="main_admin_content">
         <section class="section_one">
            <div class="sidenav">
            <button class="dropdown-btn"> <p class="prod_title">Produits</p> <p>&#11167;</p> </button>
            <div class="dropdown-container">
            <a href="../product/categorie_pc.php">Pc</a>
            <a href="../product/categorie_portable.php">Portable</a>
            <a href="../product/categorie_imprimante.php">Imprimante</a>
            <a href="../product/categorie_accessoire.php">Accessoire</a>
            </div>
            <a href="./users_index.php"> Clients </a> 
            <a href="./commande_cl.php"> Commandes </a> 
         </div>
         </section>
                