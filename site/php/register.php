<?php

if (isset($_POST['signup-submit'])) {

   require 'dbh.php';

   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $password = $_POST['pwd'];
   $passwordrepeat = $_POST['pwd-repeat'];

   if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($passwordrepeat)) {
       header("location:../signuppage.php?error=emptyfields&nom=".$nom."&prenom".$prenom."&email=".$email);
       exit();
   }

   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location:../signuppage.php?error=invalidmail&nom=".$nom."&prenom".$prenom);
    exit();
   }

    else if($password !== $passwordrepeat){
        header("location:../signuppage.php?error=passwordcheck&nom=".$nom."&prenom".$prenom."email=".$email);
        exit(); }

    else {

         $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../signuppage.php?error=sqlerror");
            exit(); 
        }
         else {
         mysqli_stmt_bind_param($stmt, "s", $email) ;
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultcheck = mysqli_stmt_num_rows($stmt);
         if ($resultcheck > 0) {
            header("location:../signuppage.php?error=takenemail&nom=".$nom."&prenom".$prenom);
            exit();
         }

         else {

            $sql = "INSERT INTO users (nomUsers, prenomUsers, emailUsers, pwdUsers) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../signuppage.php?error=sqlerror");
            exit();
         }
         else {

          $hashedpwd = password_hash($password, PASSWORD_DEFAULT );

          mysqli_stmt_bind_param($stmt, "ssss",$nom, $prenom, $email, $hashedpwd) ;
          mysqli_stmt_execute($stmt);
          header("location:../loginpage.php?signup=succes");
            exit();

         }

         }

        }
     }

    mysqli_stmt_close($stmt);
    mysqli_close($conn); 

}

else{
    header("location:../signuppage.php");
    exit();
}



