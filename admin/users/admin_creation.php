<?php require 'admin_navbar.php';
if(!isset($_SESSION['login']))
{
  header("Location:../index.php"); 
}else{
?>
         <section class="section_two">
         <div class="signin-page">
        <h1 class="signin-title">Admin</h1>
        
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
              if (isset($_GET['signup'])) {
                if ($_GET['signup'] == "succes") {
                  echo "<p class='succesmsg'>Le nouveau compte a été ajouté</p>";
                } 
            }
            ?>

         
            <form class="main-signin-form" action="../php/register_php.php" method="post">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prenom" required>
                <input type="Email" name="email" placeholder="Email" required>
                <input type="password" name="pwd" placeholder="Mot de passer" required>
                <input type="password" name="pwd-repeat" placeholder="Confirmer mot de passe" required>
                <div class="main-signup-action">
                    <button class="main-signin-button" type="submit" name="signup-submit">CREER VOTRE COMPTE</button><br>
                </div>
            </form>
            </div>
         </section>
         <script type="text/javascript" src="../js/menu-js.js"></script>
     </main>
</body>
</html>
            <?php } ?>