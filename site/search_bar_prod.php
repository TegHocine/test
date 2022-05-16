<?php require './nav_bar_doc.php' ;?>
<?php if (isset($_GET['id'])) 
{
     $id=$_GET['id']; ?>
<main class="main_search_product">
<div class="search_card">
      <div class="card__title">
        <div class="icon">
          <a href="#" onClick="history.back()">&#129128;</a>
        </div>

      </div>
      <?php 
      require './php/dbh.php';        
      $sql = "SELECT * FROM product where idProd='$id';";
      if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_array($result)){ ?>
      <div class="card__body">
        <div class="half">
          <div class="featured_text">
            <h2><?php echo $row['catProd']; ?></h2>
            <p class="sub"><?php echo $row['nomProd'];?></p>
            <p class="price"><?php echo number_format($row['prixProd'], 2); ?>&nbsp;DA</p>
          </div>
          <div class="image">
          <img src="../database_image/<?php echo $row['imgProd']; ?> ">
          </div>
        </div>
        <div class="half">
          <div class="description">
            <p><h3>description</h3><?php echo $row['discProd']; ?></p>
          </div>
        </div>
      </div>
      <div class="card__footer">
        <div class="recommend">
          <p>Recommender par</p>
          <h3>Gearbox</h3>
        </div>
        <div>
        <form class="cart_search_button" method="post" action="./cart_page.php?action=add&id=<?php echo $row['idProd'];?>">
          <input type="hidden" name="hidden_img" value="<?php echo $row['imgProd'];?>"/>
          <input type="hidden" name="hidden_cat" value="<?php echo $row['catProd'];?>"/>
          <input type="hidden" name="hidden_name" value="<?php echo $row['nomProd'];?>"/>
          <input type="hidden" name="hidden_price" value="<?php echo $row['prixProd']; ?>"/>
          <button type="submit" name="add_to_cart">Add to cart</button>
        </form>
        </div>
      </div>
      <?php }} ?>
    </div>
  </main>

<?php require './footer_bar_doc.php' ;?>
<?php }else{
    header("Location:./index.php");
    exit();
}} ?>