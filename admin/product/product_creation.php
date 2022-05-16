<?php require 'admin_navbar.php';
if(!isset($_SESSION['login']))
{
  header("Location:../index.php"); 
}else{
?>
         <section class="section_two">
         <div class="signin-page">
          <h1 class="signin-title">Ajouter produit</h1>
          <?php
            if (isset($_GET['error'])) {
                      if ($_GET['error'] == "error") {
                        echo "<p class='errormsg'>Le produit n'a pas été ajouté</p>";
                      } 
                  }
             if (isset($_GET['succes'])) {
                    if ($_GET['succes'] == "succes") {
                      echo "<p class='succesmsg'>Le produit a été ajouté</p>";
                    } 
                }
                ?>
     <form class="main-signin-form" method="POST" action="../php/product_creation_php.php" enctype="multipart/form-data" >
     <div class="categorie_prod">
     <label id="label">Categorie produits</label>
     <select name="cat_prod" id="catg-select" require>
       <option value="PC">PC</option>
       <option value="PORTABLE">PORTABLE</option>
       <option value="IMPRIMANTE">IMPRIMANTE</option>
       <option value="ACCESSOIRE">ACCESSOIRE</option></select>
       </div>
       <input type="text" name="nom_prod" placeholder="Nom Produit" required>
       <input type="text" name="prix_prod" placeholder="Prix produit" required>
       <textarea id="product_description"  cols="40" rows="4" name="image_text" placeholder="discription" required></textarea>
  	   <input class="upimage" type="file" name="image" required>
      <div class="main-signup-action">
  		<button class="main-signin-button" type="submit" name="upload">Ajouter</button>
  	  </div>
     </form>
            </div>
         </section>
         <script type="text/javascript" src="../js/menu-js.js"></script>
     </main>
</body>
</html>
              <?php } ?>