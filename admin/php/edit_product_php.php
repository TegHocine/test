<?php
if (isset($_POST['upload'])) {
    require 'dbh.php';

    $categorie =$_POST['cat_prod']; 
    $product_id =  $_POST['edit_but'];
    $product_nom =  $_POST['nom_prod'];
    $product_prix =  $_POST['prix_prod'];
    $image_text =  $_POST['image_text'];

    $image = (isset($_FILES['image']['name'])) ? $_FILES['image']['name'] :"";

if (!empty($image)) {
 
    $imagename = $_FILES['image']['name'];
    $imagetmp = $_FILES['image']['tmp_name'];
    $imageext = explode('.',$imagename);
    $imageactualext = strtolower(end($imageext));

    $allowed = array('png','jpeg','jpg');

    if (in_array($imageactualext, $allowed)) {
    $imagenewname = uniqid('',true).'.'.$imageactualext;
    $target = "../../database_image/". $imagenewname;
    
    $sql = "UPDATE product SET catProd=?, nomProd=?, prixProd=?, discProd=?, imgProd=? WHERE idProd='$product_id'";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        switch ($categorie) {
            case "PC":
                header("location:../product/categorie_pc.php?error=sqlerror");
                break;
            case "IMPRIMANTE":
                header("location:../product/categorie_imprimante.php?error=sqlerror");   
                break;
            case "PORTABLE":
                header("location:../product/categorie_portable.php?error=sqlerror"); 
                break;
            case "ACCESSOIRE":
                header("location:../product/categorie_accessoire.php?error=sqlerror");   
                break;
        }
          exit();
    } elseif (move_uploaded_file($imagetmp, $target)) {
     mysqli_stmt_bind_param($stmt, "sssss",$categorie, $product_nom, $product_prix, $image_text,  $imagenewname) ;
     mysqli_stmt_execute($stmt);
     switch ($categorie) {
        case "PC":
            header("location:../product/categorie_pc.php?succes=succes");
            break;
        case "IMPRIMANTE":
            header("location:../product/categorie_imprimante.php?succes=succes");   
            break;
        case "PORTABLE":
            header("location:../product/categorie_portable.php?succes=succes"); 
            break;
        case "ACCESSOIRE":
            header("location:../product/categorie_accessoire.php?succes=succes");   
            break;
    }
     exit();
    
    } }else{       
      header("location:../product/product_index.php");
         exit();}
   
        }else{
            $sql = "UPDATE product SET catProd=?, nomProd=?, prixProd=?, discProd=? WHERE idProd='$product_id'";
    
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss",$categorie, $product_nom, $product_prix, $image_text) ;
                mysqli_stmt_execute($stmt);
                switch ($categorie) {
                   case "PC":
                       header("location:../product/categorie_pc.php?succes=succes");
                       break;
                   case "IMPRIMANTE":
                       header("location:../product/categorie_imprimante.php?succes=succes");   
                       break;
                   case "PORTABLE":
                       header("location:../product/categorie_portable.php?succes=succes"); 
                       break;
                   case "ACCESSOIRE":
                       header("location:../product/categorie_accessoire.php?succes=succes");   
                       break;
                }
                  exit();
            }
            else {

                switch ($categorie) {
                    case "PC":
                        header("location:../product/categorie_pc.php?error=sqlerror");
                        break;
                    case "IMPRIMANTE":
                        header("location:../product/categorie_imprimante.php?error=sqlerror");   
                        break;
                    case "PORTABLE":
                        header("location:../product/categorie_portable.php?error=sqlerror"); 
                        break;
                    case "ACCESSOIRE":
                        header("location:../product/categorie_accessoire.php?error=sqlerror");   
                        break;}
             exit();
            
            } }
  }else{       
      header("location:../product/product_index.php");
         exit();}