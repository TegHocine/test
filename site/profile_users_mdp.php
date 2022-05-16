<?PHP require './nav_bar_doc.php'; ?>
<?php  
if(! isset($_SESSION['login_c']))
{
  header("Location:./loginpage.php"); 
}else{
?>
     <main class="main_profile_content">
     <section class="section_one">
         <ul class="section_one_menu">
                <li> <a href="./profile_users_infos.php" > Général </a> </li>
                <li> <a href="./profile_users_mdp.php"> Securite </a> </li>
             </ul>
         </section>
         <section class="section_two">
         <h1 class="signin-title">modifier mot de passe</h1>
             <?php
             if (isset($_GET['succes'])) {
                if ($_GET['succes'] == "modifier") {
                  echo '<p class="succesmsg">Votre mot de passe a  été modifiées</p>';
                }}
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "nouser") {
                      echo '<p class="errormsg">Impossible de trouver un compte correspondant à cette adresse e-mail</p>';
                    } else if ($_GET['error'] == "emptyfields") {
                      echo '<p class="errormsg">Veuillez remplir tous les champs</p>';
                    } else if ($_GET['error'] == "wrongpwd") {
                      echo '<p class="errormsg"> Verifier votre mot de passe</p>';
                    }else if ($_GET['error'] == "passwordcheck") {
                        echo '<p class="errormsg">Vous mot de passe ne sont pas identique</p>';}
                }
                ?>
           <form class="client_infos" action="./php/edit_clientmdp_php.php" method="post">
           <label class="label">Mot de passer</label>
           <input class="input" type="password" name="pwd" placeholder="Password" required>
           <label class="label">Nouveau mot de passer</label>
           <input class="input" type="password" name="n-pwd" placeholder="Password" required>
           <label class="label">Confirmer mot de passer</label>
           <input class="input" type="password" name="n-pwd-repeat" placeholder="Password" required>
           <div class="main-client-action">
           <input type="hidden" name="edit_but" value="<?php echo $id; ?>">
           <button class="main-client-button" type="submit" name="submit_pwd">Modifier</button><br>
          </div>
           </form>  
        </section>
          </form>
        </section>
              </main>
        <?php require './footer_bar_doc.php';}?>