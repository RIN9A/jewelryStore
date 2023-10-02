<?php

require_once "config.php";
require_once "session.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // validate if email is empty
    
    if (empty($email)) {
        $error .= '<p class="error">Введите email.</p>';
    }

    // validate if password is empty
    if (empty($password)) {
        $error .= '<p class="error">Введите пароль.</p>';
    }

    if (empty($error)) {
        $query = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($db, $query);
        if($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row ) {
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION["username"] = $row['name'];
                    $_SESSION["email"] =$email;
                    header("location: welcomee.php");
                    
                    
                    // Redirect the user to welcome page
                   // header("location: welcome.php");
                    exit;
                } else {
                    $error .= '<p class="error">Не верный пароль!</p>';
                }
            } else {
                $error .= '<p class="error">Пользователь с данной электронной почтой не зарегистрирован.</p>';
            }
        }
       // $query->close();
    }
    // Close connection
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Вход</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Вход</h2>
                    <p>Введите ваш email  и пароль</p>
                    <?php echo $error; ?>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label>Email </label>
                            <input type="email" name="email" class="form-control" required />
                        </div>    
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                        <p>Не зарегистрированы? <a href="register.php">Регистрация</a>.</p>
                        <p><a href="/index.php">Перейти в магазин</a></p>
                    </form>
                </div>
            </div>
        </div>    
    </body>
</html>