<?PHP require './nav_bar_doc.php'; ?>

<main class="main_container">
    <div class="titel_product"><a href="./index.php">Accuiel</a><h6>&nbsp;&nbsp;>&nbsp;&nbsp;Nos Pc&nbsp;:</h6> </div>
    <?php 
            if (isset($_GET['error'])) {
                     if ($_GET['error'] == "iaadded") {
                        echo '<p class="errormsg">Le produit a déjà été ajouté à votre panier</p>';
                      } elseif ($_GET['error'] == "needconn") {
                        echo '<p class="errormsg">Vous devez etre connecté pour ajouter un produit</p>';
                      } 
                     }
            if (isset($_GET['succes'])) {
               if ($_GET['succes'] == "added") {
                 echo '<p class="succesmsg">Le produit a été ajouté à votre panier</p>';
              }}
                ?>
<div class="content_container">
 
<?php 
      require './php/dbh.php';        
      $sql = "SELECT * FROM product where catProd='PC';";
      if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_array($result)){ ?>
                                    
    <div class="product-card">
             <a class="container_details" href="./search_bar_prod.php?id=<?= $row['idProd']; ?>">
             <div class="badge">Details hi</div>
             <h4 class="product_details"><?php echo $row['discProd']; ?></h4>
             </a>
             <div class="product-tumb">
                <img src="../database_image/<?php echo $row['imgProd']; ?> ">
             </div>
             <div class="product-infos">
                 <span class="product-catagory"><?php echo $row['catProd']; ?></span>
                 <h4><a href="#"><?php echo $row['nomProd'];?></a></h4>
                 <div class="product-bottom-infos">
                    <div class="product-price"><?php echo number_format($row['prixProd'], 2, ',', ' '); ?>&nbsp;DA</div>
                    <div class="product-links">
                    <form method="post" action="./cart_page.php?action=add&id=<?php echo $row['idProd'];?>">
                        <input type="hidden" name="hidden_img" value="<?php echo $row['imgProd'];?>"/>
                        <input type="hidden" name="hidden_cat" value="<?php echo $row['catProd'];?>"/>
                        <input type="hidden" name="hidden_name" value="<?php echo $row['nomProd'];?>"/>
                        <input type="hidden" name="hidden_price" value="<?php echo $row['prixProd']; ?>"/>
                        <button type="submit" name="add_to_cart" class="add_prod_cart"><img src="./img/product/addcartor.svg" alt="add_cart"></button>
                          </form>
                      </div>
             </div>
             </div>
         </div> 
         <?php  }}} mysqli_close($conn);  ?> 

</div>

</main>

<?PHP require './footer_bar_doc.php'; ?>