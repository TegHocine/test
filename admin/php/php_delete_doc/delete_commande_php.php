<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "../dbh.php";
    
    $sql = "DELETE FROM commande WHERE idComd = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        if(mysqli_stmt_execute($stmt)){
            
            header("location:../../users/commande_cl.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($link);
} else{
   
    if(empty(trim($_GET["id"]))){
       
        header("location:../../users/commande_cl.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="../../admin_css/delete_css.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-one">
            <div class="container-two">
                <div class="container-three">
                    <div class="page-header">
                        <h1>Supprimer commande</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <h4>Etes vous sur de vouloir supprimer cette commande?</h4><br>
                            <p class="btn">
                                <input type="submit" value="Oui" class="btn-danger">
                                <a href="../../users/commande_cl.php" class="btn-default">Non</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>