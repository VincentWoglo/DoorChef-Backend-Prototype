<?php
require('navbar.php');
require('db_conn.php');
$mysql = "SELECT * FROM products LIMIT 12" or die();
$mysqli = mysqli_query($conn, $mysql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DoorChef</title>
    <link rel="stylesheet" href="css/home.css">
  </head>
    <!--<div class="option">
  <a href="food.php"><input type="submit" class="op-food" name="" value="Food" /></a>
   <a href="chef.php"><input type="submit" class="op-chef" name="" value="Chef" /></a>
    </div>-->
  <div class="whole">
    <p class="rec">Recommended in foods</p>

  <?php
  while ($row = mysqli_fetch_assoc($mysqli)) {?>
     <a href="product.php?title=<?php echo $row['title'];?>&& id=<?php echo $row['id'];?>&&seller=<?php echo $row['soldby'];?>"><div class="container" >

      <div class="product">
      <p class="price">$<?=$row['price'];?></p>
        <img src="image/<?=$row['image'];?>" height="183px" width= "275px" class="gig-img" alt="">
        <h1 class="title"><?=$row['title'];?></h1>
        <p class="location"><?=$row['city'];?>, <?=$row['state'];?>  *</p>
        <p class="foodtype">   <?=$row['foodtype'];?></p>
      </div> </a>

    </div>
      <?php
    }
  ?>
  </body>
</html>
