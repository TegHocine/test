<?PHP require './nav_bar_doc.php'; ?>
<?php  
if(!isset($_SESSION['login_c']))
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
         <h1 class="signin-title">modifier information</h1>
             <?php
             if (isset($_GET['succes'])) {
                if ($_GET['succes'] == "modifier") {
                  echo '<p class="succesmsg">Vos informations ont été modifiées</p>';
                } 
            }?>
           <form class="client_infos" action="./php/edit_client_php.php" method="post">
           <?php 
            require './php/dbh.php'; 
            $id = $_SESSION['userId'];       
            $sql = "SELECT * FROM users where idUsers='$id'";
            if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result)){ ?>
           <label class="label">Votre Nom</label>
           <input class="input" type="text" name="nom" value="<?php echo $row['nomUsers'] ;?>">
           <label class="label">Votre Prenom</label>
           <input class="input" type="text" name="prenom" value="<?php echo $row['prenomUsers'];?>">
           <label class="label">Votre E-mail</label>
           <input class="input" type="Email" name="email" value="<?php echo $row['emailUsers'];?>">
           <?PHP   }  }  } ; ?>
           <div class="main-client-action">
            <input type="hidden" name="edit_but" value="<?php echo $id; ?>">
            <button class="main-client-button" type="submit" name="submit_info">Modifier</button><br>
            </div>
           </form>  
        </section>
           
  
     </main>
     <?php require './footer_bar_doc.php';}?>
    