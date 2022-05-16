<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin_css/login_css.css">
    <title>login</title>
</head>


<body>
    <main>
    <div class="signin-page">
        <h1 class="signin-title">Se connecter</h1>
        <?php
            
        if (isset($_GET['error'])) {
                  if ($_GET['error'] == "nouser") {
                    echo '<p class="errormsg">Impossible de trouver un compte correspondant à cette adresse e-mail</p>';
                  } else if ($_GET['error'] == "emptyfields") {
                    echo '<p class="errormsg">Veuillez remplir tous les champs</p>';
                  } else if ($_GET['error'] == "wrongpwd") {
                    echo '<p class="errormsg"> Verifier votre mot de passe</p>';
                  }
              }

            ?>
        <div>
            <form class="main-signin-form" action="./php/login-php.php" method="post">
                <input type="Email" name="mailuid" placeholder="Email" required>
                <input type="password" name="pwd" placeholder="Password" required>
                <div class="main-signup-action">
                    <button class="main-signin-button" type="submit" name="login-submit">SE CONNECTER</button><br>
                </div>
            </form>
            
        </div>
    </div>
    </main>
    <footer>

    </footer>
    
</body>
</html>