<?php
session_start();
if (isset($_POST['command_sub'])) {

    require 'dbh.php';

$client_info = 'client('.$_POST['id_cl'].'):'.$_POST['nom_cl'].'&nbsp;'.$_POST['prenom_cl'].'<br>'.'numero:'.$_POST['number_cl'];
$client_adr =$_POST['adresse_cl'];
$prodinfo = $_POST['product_info'];
$total = $_POST['price_total'];
echo $client_adr;
echo $client_info;
echo $prodinfo;
echo $total;

$sql = "INSERT INTO commande (infoclComd, adrclComd, infoprodComd, prixComd) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
header("location:../cart_page.php?error=sqlerror");
exit();
}
else {

mysqli_stmt_bind_param($stmt, "ssss",$client_info, $client_adr, $prodinfo,$total) ;
mysqli_stmt_execute($stmt);
unset($_SESSION["nbr_prod"]);
header("location:../cart_page.php?succes=comm");
exit();

}

}else{
    header("location:../index.php");
    exit();  
}