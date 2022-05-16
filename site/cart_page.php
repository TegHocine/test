<?php require 'nav_bar_doc.php'; ?>

<?php 
 $categorie = (isset($_POST["hidden_cat"])) ? $_POST["hidden_cat"] :"";
if(!isset($_SESSION['login_c']))
{
    switch ($categorie) {
        case "PC":
            header("location:./prodpc_page.php?error=needconn");
            break;
        case "IMPRIMANTE":
            header("location:./prodimprimante_page.php?error=needconn");  
            break;
        case "PORTABLE":
            header("location:./prodportable_page.php?error=needconn");
            break;
        case "ACCESSOIRE":
            header("location:./prodaccessoire_page.php?error=needconn");   
            break;
        case "":
            header("location:./loginpage.php?error=needconn");   
            break;
    }
}else{
if(isset($_POST["add_to_cart"])){
    
     $catg = (isset($_POST["hidden_cat"])) ? $_POST["hidden_cat"] :"";
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
            $count = count($_SESSION["shopping_cart"]);
            $nbr_prod = $count + 1 ;
			$item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_img'			=>	$_POST["hidden_img"],
                'item_cat'			=>	$_POST["hidden_cat"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
			);
            $_SESSION["shopping_cart"][$count] = $item_array;
            $_SESSION["nbr_prod"] =  $nbr_prod;
            switch ($catg) {
                case "PC":
                    header("location:./prodpc_page.php?succes=added&count=$nbr_prod");
                    break;
                case "IMPRIMANTE":
                    header("location:./prodimprimante_page.php?succes=added&count=$nbr_prod");  
                    break;
                case "PORTABLE":
                    header("location:./prodportable_page.php?succes=added&count=$nbr_prod");
                    break;
                case "ACCESSOIRE":
                    header("location:./prodaccessoire_page.php?succes=added&count=$nbr_prod");   
                    break;
            }exit();
		}else{
            switch ($catg) {
                case "PC":
                    header("location:./prodpc_page.php?error=iaadded");
                    break;
                case "IMPRIMANTE":
                    header("location:./prodimprimante_page.php?error=iaadded");  
                    break;
                case "PORTABLE":
                    header("location:./prodportable_page.php?error=iaadded");
                    break;
                case "ACCESSOIRE":
                    header("location:./prodaccessoire_page.php?error=iaadded");   
                    break;
            }exit();
		}
	}
	else
	{
		$item_array = array(
			    'item_id'			=>	$_GET["id"],
                'item_img'			=>	$_POST["hidden_img"],
                'item_cat'			=>	$_POST["hidden_cat"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
		);
        $_SESSION["shopping_cart"][0] = $item_array;
        $_SESSION["nbr_prod"] =  1;
        switch ($catg) {
            case "PC":
                header("location:./prodpc_page.php?succes=added&count=$nbr_prod");
                break;
            case "IMPRIMANTE":
                header("location:./prodimprimante_page.php?succes=added&count=$nbr_prod");  
                break;
            case "PORTABLE":
                header("location:./prodportable_page.php?succes=added&count=$nbr_prod");
                break;
            case "ACCESSOIRE":
                header("location:./prodaccessoire_page.php?succes=added&count=$nbr_prod");   
                break;
        }exit();
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
                header("location:./cart_page.php?succes=deleted");
                $_SESSION["nbr_prod"] =  $_SESSION["nbr_prod"]-1 ;
                exit();
			}
		}
	}
}

?>
<main>
<div class="cart_items">
<div class="titel_cart">Panier&nbsp; :</div>
<?php if (isset($_GET['succes'])) {
                    if ($_GET['succes'] == "deleted") {
                      echo '<p class="succesmsg">Le produit a été supprimé de votre panier</p>';
                    }else if ($_GET['succes'] == "comm") {
                        echo '<p class="succesmsg">Votre commande a bien été envoyée</p>';
                        unset($_SESSION["shopping_cart"]);
                       echo ' <img class="empty_cart" src="./img/product/emptycart.svg" >
                         <p class="empty_cart_text">Votre panier est vide</p>
                         ';
                        exit();
                      }}?>
                      
<?php if(!empty($_SESSION["shopping_cart"])) {?>

    <table class="cart_table">
        <tr>
            <th class="prod_panier">Produit</th>
			<th>Prix unitaire</th>
			<th>Action</th>
        </tr>
     <?php
            $total = 0;
            $prodinfo='';
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
		?>
        <tr>
			<td>
              <div class="product_info">
                  <img src="../database_image/<?php echo $values["item_img"]; ?>" >
                  <div>
                      <p><?php echo $values["item_cat"]; ?></p>
                      <p><?php echo $values["item_name"]; ?></p>
                  </div>
              </div>
            </td>
			<td class="panier_price"><?php echo number_format($values["item_price"], 2, ',', ' '); ?>&nbsp;DA</td>
			<td class="panier_delete"><a href="./cart_page.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="button_delete"><img src="./img/product/trash.svg"></a></td>
        </tr>
        <?php $total = $total + $values["item_price"];
              $prodinfo = $prodinfo.'prod('.$values["item_id"].'):'.$values["item_name"].'<br>';}
         ?>
    </table>
    <div class="container_com">
    <div class="cart_price">
    <p>total:&nbsp;&nbsp;&nbsp;&nbsp; <big><?php echo  number_format($total, 2, ',', ' '); ?>&nbsp;DA</big>&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <div class="confimer">
        <form action="./command_conf.php" method="post">
        <input type="hidden" name="product_info" value="<?php echo  $prodinfo;?>"/>
        <input type="hidden" name="price_total" value="<?php echo  $total; ?>"/>
        <button type="submit" name="command" class="command_info">Finaliser votre commande</button>
        </form>
        
        </div>
    </div>
    </div>
    <?php } else{?>
    <img class="empty_cart" src="./img/product/emptycart.svg" >
    <p class="empty_cart_text">Votre panier est vide</p>
    <?php }?>
</div>
</main>
<?php require 'footer_bar_doc.php';}?>
