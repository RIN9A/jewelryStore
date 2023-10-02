<?php
   //$servername = "localhost"; // Replace with your server name
   //$username = "root"; // Replace with your MySQL username
   //$password = "root"; // Replace with your MySQL password
  // $dbname = "jewelryshopdb"; // Replace with your database name
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
   if(isset($_GET['id'])){
      $cat_id = $_GET['id'];

      if($cat_id === '0'){
         $sql = "SELECT * FROM jewelry";
      }else{
         if($cat_id === '6' && isset($_SESSION)){
            $html1 = '';
            $us_id = $_SESSION['userid'];
            $sign_id =  $conn -> query("SELECT zodiac_id FROM zodiacsign_users where user_id= $us_id");
            $sign_id_r = $sign_id -> fetch_array()['zodiac_id'];
            $sql = "SELECT * FROM jewelry INNER JOIN zodiacjewelryrecommendations on jewelry.id =  zodiacjewelryrecommendations.jewelry_id where zodiacjewelryrecommendations.zodiac_id= $sign_id_r";
            $sql1 = $sql;
            $rdes = $conn -> query($sql1);
            while($row = $rdes ->fetch_assoc()){
               $id1 = $row['id'];
               $strr = $conn -> query("SELECT getStoneDescription ($id1)");
               $strr = $strr -> fetch_array();
               $html1 .= $strr[0];
               }
               echo "<ul>".$html1."</ul>";
            
            
         } 
           else {
              $sql =  "SELECT * FROM jewelry JOIN jewelrycategoryrelations on jewelry.id = jewelrycategoryrelations.jewelry_id where jewelrycategoryrelations.category_id = $cat_id";}
      }
         
     
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
   }


   // Return the products array as JSON
   }
   // Close connection
   $conn->close();
   
   ?>
