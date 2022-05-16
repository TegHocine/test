<?php

if (isset($_POST['login-submit'])){

    require 'dbh.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("location:../index.php?error=emptyfields");
        exit();
    }

    else {
        $sql = "SELECT * FROM ad_bdd WHERE emailAd= ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../index.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $mailuid) ;
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row['pwdAd']);
                if ($pwdcheck == false) {
                    header("location:../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdcheck == true) {
                  session_start();
                  $_SESSION['login'] = true;
                  $_SESSION['adminId'] = $row['idAd'];
                  $_SESSION['adminPrenom'] = $row['prenomAd'];
                  
                  header("location:../users/users_index.php?login=success");
                    exit();
                }else{
                    header("location:../index.php?error=wrongpwd");
                    exit();
                }

            }
            else{
                header("location:../index.php?error=nouser");
                exit();
            }

        }

    }

}
else{
    header("location:../index.php");
    exit();
}