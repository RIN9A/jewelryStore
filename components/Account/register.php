<?php
require_once "config.php";
require_once "session.php";
$error = '';
function getZodiacalSign($month, $day) {
    $month = (int) $month;
    $day = (int) $day;
    $signs = array(10, 11, 12, 1, 2, 3, 4,5, 6, 7, 8,9);
    $signsstart = array(1=>21, 2=>20, 3=>20, 4=>20, 5=>20, 6=>20, 7=>21, 8=>22, 9=>23, 10=>23, 11=>23, 12=>23);
    return $day < $signsstart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    
  
    $fullname = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $bithday = $_POST['bithday'];
    list($year, $month, $day) = explode('-', $bithday);
    
    $sign = getZodiacalSign($month, $day);
    
    
    
    
    $db -> query("DROP TRIGGER IF EXISTS add_zodiac_sign;");
    
    $db -> query( "CREATE TRIGGER add_zodiac_sign 
AFTER INSERT
ON Users FOR EACH ROW
BEGIN
INSERT INTO ZodiacSign_Users (user_id, zodiac_id) 
VALUES (NEW.id, $sign );
END;");
    

    

    $confirm_password = trim($_POST["confirm_password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    
    
    
    
    if($query = $db -> prepare("SELECT * FROM users WHERE email = ?")){
        
        $error = '';
       // включаем перехват ошибок
        $query->bind_param('s', $email);
        $query -> execute();

        $query ->store_result();
        if($query->num_rows > 0){
            $error .= '<p class="error">Данный адрес электронной почты уже зарегистрирован!</p>';
        }
        else {
            if (strlen($password ) < 6) {
                $error .= '<p class="error">Длина праоля должна быть больше 6</p>';
            }
            if (empty($confirm_password)) {
                $error .= '<p class="error">Введите пароль второй раз для подтверждения.</p>';
            } else {
                if (empty($error) && ($password != $confirm_password)) {
                    $error .= '<p class="error">Пароли не совпадают.</p>';
                }}
                
                if(empty($error)){
                    try{
                        $sql = "INSERT INTO users (name, email, password, bithday) VALUES (?, ?, ?, ?)";

                        $trigger_error = '';

                        $stmt = $db->prepare($sql);
                        $stmt->bind_param("ssss", $fullname, $email, $password_hash, $bithday);
                        if($stmt -> execute()){
                            $error .= "<p class='success'>Регистрация выполнена успешно!</p>";
                        }}catch (Exception $e){
                        echo "<script>alert('".$e->getMessage()."');</script>";
                    }
            
                                           
                    }
                    $stmt ->close();
                }
                 
            }
            
       
   
     mysqli_close($db);
    }
?>


<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Регитсрация</h2>
                    <p>Введите данные о себе</p>
                  
                    <form action="register.php" method="post">
                        <div class="form-group">
                        <?php echo $error?>
                            <label>Имя</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div>
                         <br><br>
                        <label> Дата рождения:</label> <input name="bithday" class="znak" id="month" type="date"></input>
                       
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required />
                        </div>    
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Подтверждение пароля</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                      
                        <p>Уже зарегистрированы? <a href="login.php">Вход</a>.</p>
                        <p><a href="/index.php">Перейти в магазин</a></p>

                    </form>
                </div>
            </div>
        </div>    
    </body>
</html>
