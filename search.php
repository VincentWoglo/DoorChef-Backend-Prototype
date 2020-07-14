 <?php
  require('db_conn.php');
    
  $search = htmlentities($_GET['search']);
  $result = ("SELECT * FROM products WHERE title LIKE '%".$search."%' LIMIT 12" );
  $query = mysqli_query($conn, $result);
  require('navbar.php');

  ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$search;?> - DoorChef</title>
    <link rel="stylesheet" href="css/search.css">
                
  </head>
 
  <body>
  
  <div class="whole">





      <p class="rec">Results for: <?php echo $search;?>
    <?php 

      while ($a = mysqli_fetch_assoc($query)) {?>
       

     <a href="product.php?title=<?php echo $a['title'];?>&& id=<?php echo $a['id'];?>&&seller=<?php echo $a['soldby'];?>"><div class="container" >

      <div class="product">
      <p class="price">$<?=$a['price'];?></p>
        <img src="image/<?=$a['image'];?>" height="183px" width= "275px" class="gig-img" alt="">
        <h1 class="title"><?=$a['title'];?></h1>
        <p class="location"><?=$a['city'];?>, <?=$a['state'];?>  *</p>
        <p class="foodtype">   <?=$a['foodtype'];?></p>
      </div> </a>

    </div>
<?php
    }?>
  </body>
</html>
