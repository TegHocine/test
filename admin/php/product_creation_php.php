<?php
 
  if (isset($_POST['upload'])) {
    require 'dbh.php';
      
      $categorie =$_POST['cat_prod'];
      $product_nom = $_POST['nom_prod'];
      $product_prix = $_POST['prix_prod'];
      $image_text = $_POST['image_text'];

      $image = $_FILES['image'];

      $imagename = $_FILES['image']['name'];
      $imagetmp = $_FILES['image']['tmp_name'];

      $imageext = explode('.',$imagename);
      $imageactualext = strtolower(end($imageext));

      $allowed = array('png','jpeg','jpg');
  	
  	if (in_array($imageactualext, $allowed)) {
    $imagenewname = uniqid('',true).'.'.$imageactualext;
    $target = "../../database_image/". $imagenewname;

    $sql = "INSERT INTO product (catProd, nomProd, prixProd, discProd, imgProd) VALUES (?, ?, ?, ?,?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../product/product_creation.php?error=sqlerror");
          exit();
    }
    elseif (move_uploaded_file($imagetmp, $target)) {
     mysqli_stmt_bind_param($stmt, "sssss",$categorie, $product_nom, $product_prix, $image_text,  $imagenewname) ;
     mysqli_stmt_execute($stmt);
    header("location:../product/product_creation.php?succes=succes");
     exit();

    } else{
       header("location:../product/product_creation.php?error=error");
       }
  }else{
          header("location:../product/product_creation.php?error=error");
        }
  }else{       
      header("location:../product/product_creation.php");
         exit();}
         