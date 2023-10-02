<?php

$servername = "localhost";
$username = "root";
$password = "2005Tuzik3892";
$dbname = "jewelryshopdb";
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Выборка данных из таблицы categories
$sql = "SELECT * FROM jewelrycategories";
$result = $conn->query($sql);
// Вывод названий категорий в HTML

$count = 1;
if ($result->num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo '<li ><a href ="?id=' .$row['id'].'">' .  $row['name']  . '</a></li>';
        $count = $count+1;
        if(isset($_SESSION['userid']) && $count ===6){
            $us_id = $_SESSION['userid'];
            $sign_id =  $conn -> query("SELECT zodiac_id FROM zodiacsign_users where user_id= $us_id");
            $sign_id_r = $sign_id -> fetch_array()['zodiac_id'];
            $sign = $conn->query("SELECT name FROM zodiacsigns where id= $sign_id_r");
            $sign_r = $sign -> fetch_array()['name'];

            echo '<li ><a href ="?id=' .$count.'">' . $sign_r . '</a></li>';

        }
    }
    
} else {
    echo "0 results";
}

$conn->close();



?>