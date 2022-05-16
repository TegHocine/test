<?php

if (isset($_POST['login-submit'])){

    require 'dbh.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("location:../loginpage.php?error=emptyfields");
        exit();
    }

    else {
        $sql = "SELECT * FROM users WHERE emailUsers= ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../loginpage.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $mailuid) ;
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row['pwdUsers']);
                if ($pwdcheck == false) {
                    header("location:../loginpage.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdcheck == true) {
                  session_start();
                  $_SESSION['login_c'] = true;
                  $_SESSION['userId'] = $row['idUsers'];
                  $_SESSION['userPrenom'] = $row['prenomUsers'];
                  
                  header("location:../index.php?login=success");
                    exit();
                }else{
                    header("location:../loginpage.php?error=wrongpwd");
                    exit();
                }

            }
            else{
                header("location:../loginpage.php?error=nouser");
                exit();
            }

        }

    }

}
else{
    header("location:../index.php");
    exit();
}