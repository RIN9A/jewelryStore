<?php
session_start();

?>
<!DOCTYPE html>
<html lang = "ru">
<head>
  <meta charset="UTF-8">
  <meta name = "viewport" content="width=device-width, initial-scale=1.0">
  <title>Магазин украшений</title>
  <link rel = "icon" type = "image/png" href="img/favicon.png" >
  <link rel ="stylesheet" href="css/index.css">
  
</head>
<body>
 <div id="header"></div>
  <script> const  products = <?= json_encode($products) ?>
  </script>
 

 <div class="category-container">
   <nav class="category-menu">
     <ul><li><a href="?id=0">Все</a></li>
        <?php include  "get_category.php"  ?>

  </ul>
   </nav>
    
            </div>
 <div id="products">
     <?php include  "get_product.php"  ?>


</div>
<div id="shopping"></div>
 <div id = "signup"></div>
 <! -- Constants and Utils -->

 <script src="constants/root.js"></script>
 <script src="utils/localStorageUtil.js"></script>
<script src ="components/Header/Header.js"></script>
<?php include  "get_jewelry.php"  ?>


 <script> const  products = <?= json_encode($products) ?> </script>

      <script src = "components/Products/Products.js"></script>

 <script src="components/Shopping/Shopping.js"></script>

 <script src = "components/Account/login.php"></script>
 
 
 
<link rel="stylesheet" href="components/Header/Header.css">
<link rel="stylesheet" href="components/Products/Products.css">
<link rel="stylesheet" href="components/Shopping/Shopping.css">
</body>
</html>