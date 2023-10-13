<?php
   session_start();
   $host="localhost";
$port=3306; 
$socket="";
$user="root";
$password="";
$dbname="jewelryshopdb";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$id = $_GET['id'];
$count = $_POST['count'];

$price = "SELECT price FROM jewelry WHERE id = $id";

$result = $conn -> query($sql);

if ($result->num_rows > 0) {
      $insertQuery = $conn->prepare("INSERT INTO orderedjewelry (jewe, email, password) VALUES (?, ?, ?);");
      $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
      $result = $insertQuery->execute();
   

}
?>