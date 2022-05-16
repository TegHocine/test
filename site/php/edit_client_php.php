<?php
/* --------------------php modifier info----------------------*/
if (isset($_POST['submit_info'])) {
    require 'dbh.php';
    
        $product_id = mysqli_real_escape_string($conn, $_POST['edit_but']);
        $usersnom = mysqli_real_escape_string($conn, $_POST['nom']);
        $usersprenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $usersmail = mysqli_real_escape_string($conn, $_POST['email']);
  	     

    $sql = "UPDATE users SET nomUsers='$usersnom', prenomUsers='$usersprenom', emailUsers='$usersmail' WHERE idUsers='$product_id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
       echo 'Image uploaded successfully';
       header("location:../profile_users_infos.php?succes=modifier");
 }else{
       echo 'Failed to upload image';
       header("location:../profile_users_infos.php");
 }

}
  else{
    header("location:../profile_users_infos.php");
    exit();
}


