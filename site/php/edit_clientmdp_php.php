<?php
/*---------------------------php modifier mdp----------------------------*/ 

if (isset($_POST['submit_pwd'])){

    require 'dbh.php';
    $user_id = $_POST['edit_but'];
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $newpassword = $_POST['n-pwd'];
    $newpwdrepeat = $_POST['n-pwd-repeat'];

    if (empty($password) || empty($newpassword) || empty($newpwdrepeat)) {
        header("location:../profile_users_mdp.php?error=emptyfields");
        exit();
    }

    else {
        $sql = "SELECT * FROM users WHERE idUsers= ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../profile_users_mdp.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $user_id) ;
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row['pwdUsers']);
                if ($pwdcheck == false) {
                    header("location:../profile_users_mdp.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdcheck == true) {
                  if($newpassword !== $newpwdrepeat){
                    header("location:../profile_users_mdp.php?error=passwordcheck");
                    exit(); }
                    else{
                        $hashedpwd = password_hash($newpassword, PASSWORD_DEFAULT );
                      $sql = "UPDATE users SET pwdUsers='$hashedpwd' WHERE idUsers='$user_id'";
                      $result = mysqli_query($conn, $sql);
                      if ($result) {
                        header("location:../profile_users_infos.php?succes=modifier");
                  }
                    exit();
                    }
                  
                }else{
                    header("location:../profile_users_mdp.php?error=wrongpwd");
                    exit();
                }

            }
            else{
                header("location:../profile_users_mdp.php?error=wrongpwd");
                exit();
            }

        }

    }

}
else{
    header("location:../profile_users_mdp.php");
    exit();
}