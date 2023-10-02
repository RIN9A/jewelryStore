<?php


define('DBSERVER', 'localhost'); // Database server
define('DBUSERNAME', 'root'); // Database username
define('DBPASSWORD', '2005Tuzik3892'); // Database password
define('DBNAME', 'jewelryshopdb');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);


if($db === false){
    die("Error: connection error. " . mysqli_connect_error());
}

?>