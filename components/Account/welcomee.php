<?php
include "session.php";


if ( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
    header("location: login.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><b>Вы вошли в свой аккаунт!</b></p>
                     <p>Здравствуйте, <?php echo $_SESSION['username']; ?>!</p><br>
                     <p>Ваш email:  <?php echo $_SESSION['email']; ?>.</p><br>
                     
                </div>
                <p>
                
                    <a href="/index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Перейти в магазин</a>
                   <br><br>
                      <a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Выйти из аккаунта</a>

                </p>
            </div>
        </div>
        
    </body>
</html>