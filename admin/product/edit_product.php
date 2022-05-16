<?php require 'admin_navbar.php';
if(!isset($_SESSION['login']))
{
  header("Location:../index.php"); 
}else{
?>
<section class="section_two">
             <?php 
         require '../php/dbh.php';       
         $id=$_GET['id']; 
         $sql = "SELECT * FROM product WHERE idProd='$id'";
         if($result = mysqli_query($conn, $sql)){
         if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_array($result)){ ?>
         <div class="signin-page">
          <h1 class="signin-title">modifier produit</h1> 
     <form class="main-signin-form" method="POST" action="../php/edit_product_php.php" enctype="multipart/form-data" >
       <div class="categorie_prod">
     <label id="label">Categorie produits</label>
     <select name="cat_prod" id="catg-select" require>
     <option value="<?php echo $row['catProd'];?>"><?php echo $row['catProd'];?></option>
       <option value="PC">PC</option>
       <option value="PORTABLE">PORTABLE</option>
       <option value="IMPRIMANTE">IMPRIMANTE</option>
       <option value="ACCESSOIRE">ACCESSOIRE</option></select>
       </div>
       <input type="text" name="nom_prod" value="<?php echo $row['nomProd'];?>" required>
       <input type="text" name="prix_prod" value="<?php echo $row['prixProd'];?>&nbsp;DA" required>
       <textarea id="product_description"  cols="40" rows="4" name="image_text" ><?php echo $row['discProd'];?></textarea>
  	   <input class="upimage" type="file" name="image">
      <div class="main-signup-action">
        <input type="hidden" name="edit_but" value="<?php echo $id; ?>">
  		<button class="main-signin-button" type="submit" name="upload">Modifier</button>
        </div>
       
     </form>
            </div>
            <?PHP   } mysqli_free_result($result); }  } mysqli_close($conn); ?>
         </section>
         <script type="text/javascript" src="../js/menu-js.js"></script>
     </main>
</body>
</html>
         <?php } ?>