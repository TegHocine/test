<?php
if (isset($_POST['command'])) {

$prodinfo = $_POST['product_info'];
$total = $_POST['price_total'];
?>
<?php require 'nav_bar_doc.php';?>
<main class="main_main">
    <div class="section_two_com">
        <h1 class="signin-title_com">Finalisation commande</h1>
        <div>
        <?php 
            require './php/dbh.php'; 
            $id = $_SESSION['userId'];       
            $sql = "SELECT * FROM users where idUsers='$id'";
            if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_array($result)){ ?>
              
            <form class="client_infos" action="./php/confirmation_com_php.php" method="post">
                <input class="input" type="hidden" name="id_cl" value="<?php echo $row['idUsers'] ;?>"/>  
                <input class="input" type="hidden" name="product_info" value="<?php echo  $prodinfo;?>"/>
                <input class="input" type="hidden" name="price_total" value="<?php echo  $total; ?>"/>
                <label class="label">Nom</label>
                <input class="input" type="text" name="nom_cl" value="<?php echo $row['nomUsers'] ;?>">
                <label class="label">Prenom</label>
                <input class="input" type="text" name="prenom_cl" value="<?php echo $row['prenomUsers'];?>"> 
                <label class="label">Numéro</label>
                <input class="input" type="number" name="number_cl" placeholder="Numéro de téléphone" required>
                <label class="label">adresse</label>
                <textarea name="adresse_cl" id="adresse_cl" placeholder="Adresse:Wilaya/ville/Rue/Appartement/Suits/bloc/Batiment"></textarea>
                <div class="redirect_com"><a  href="./cart_page.php">Annuler</a></div>
                <div class="main-client-action">
                    <button class="main-client-button" type="submit" name="command_sub">CONFIRMER</button><br>
                </div>
            </form>
            <?php  }}}?>
        </div>
    </div>
    </main>
<?php require 'footer_bar_doc.php';?>
<?php
exit();
}else{
  header("location:./index.php");
 exit();  
}?>
