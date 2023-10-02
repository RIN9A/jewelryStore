<?php

$db = mysqli_connect("localhost", "root", "2005Tuzik3892", "jewelryshopdb");

  $host="localhost";
   $port=3306;
   $socket="";
   $user="root";
   $password="2005Tuzik3892";
   $dbname="jewelryshopdb";

   $conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

   //$con->close();


   // Create connection
   //$conn = new mysql($servername, $username, $password, $dbname);

   // Check connection
  

   // SQL query to get all products from the Jewelry table

        $sql = "SELECT * FROM jewelry";
      $result = $conn -> query($sql);
      // Array to store all products
   $products = array();
   if ($result->num_rows > 0) {
      // Loop through each row and add the data to the products array
     while($row = $result->fetch_assoc()) {
        $product = array(
           "id" => $row["id"],
         "name" => $row["name"],
         "description" => $row["description"],
         "price" => $row["price"],
         "photo" => $row["photo"]
       );
        $products[] = $product;
     }
   


   // Return the products array as JSON
   }
   // Close connection
   $conn->close();
   
   ?>

?>