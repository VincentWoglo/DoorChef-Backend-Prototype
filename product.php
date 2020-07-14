<?php
session_start();
require('db_conn.php');
$title = $_GET['title'];
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT, FILTER_FLAG_STRIP_HIGH);
$seller = filter_var(trim($_GET['seller'], FILTER_SANITIZE_STRING));
$fetch ="SELECT * FROM products WHERE title = '$title' AND id = '$id'" or die();
$mysqli = mysqli_query($conn, $fetch);
$rows = mysqli_fetch_assoc($mysqli);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$rows['title'];?> - DoorChef</title>
    <link rel="stylesheet" href="css/product.css">
  </head>
  <?php require('navbar.php'); ?>
  <body>
    <div class="containe">
      <div class="product-info">

          <img src="image/<?=$rows['image'];?>" class="image"alt="">

        <div class="img-title">
          <p class="p-gig">$<?=$rows['price'];?></p>
          <p class="t-gig"><?=$rows['foodtype'];?></p>
          <h1 class="gig-title"><?=$rows['title'];?></h1>
          <!--<input type="submit" class="message-gig"name="" value="Contact">-->
        </div>
        <div class="description">
          <?php
$queryl = "SELECT * FROM chefs WHERE seller= '".$rows['soldby']."'";
$mysqll = mysqli_query($conn, $queryl);
$rowl = mysqli_fetch_assoc($mysqll);
          ?>
          <p class="desc"><?=$rows['description'];?></p>
        </div>
        <div class="chef-info">
        <h1 class="about-t">About Seller</h1>
        <hr  class="hr">
        <p class="c-email">Email: <?=$rowl['email'];?></p>
        <p class="c-phone">Phone</p>
        <p class="c-location">location: Aurora, Colorado</p>
        <p class="c-date">09/27/2002</p>
        <p class="c-education">Education</p>
        <p class="c-price">Price</p>
        </div>
      </div>
      <?php
      $se = "SELECT * FROM products WHERE foodtype = '".$rows['foodtype']."' LIMIT 4" or die();
      $mysqlz = mysqli_query($conn, $se);?>
      
      <div class="related-products">
        <h1 class="similar-gigs">Similar Listings</h1>
        <div class="overflow">

        <?php while ($list = mysqli_fetch_assoc($mysqlz)) {?>
          <a href="product.php?title=<?php echo $list['title'];?>&& id=<?php echo $list['id'];?>&&seller=<?php echo $list['soldby'];?>"><div class="container" >
           <div class="product">
           <p class="price">$12/Hour</p>
             <img src="image/<?=$list['image'];?>" height="183px" width= "275px" class="gig-img" alt="">
             <h1 class="title"><?=$list['title'];?></h1>
             <p class="location"><?=$list['city'];?>, <?=$list['state'];?>  *</p>
             <p class="foodtype">   <?=$list['foodtype'];?></p>
           </div></a>
          
         </div>
          <?php
      }?>

      <hr class="seperate">
      <?php
      
      if (isset($_POST['p_comment'])) {
        $comment = $_POST['comment_body'];
        if (empty($comment)) {
          echo '<script type="text/javascript">';
          echo "alert('Please complete empty field')";
          echo '</script>';
        }


        elseif ($_SESSION['chef']) {
          echo '<script type="text/javascript">';
          echo "alert('Sorry you cannot submit a comment')";
          echo '</script>';
        }



        else{
          $comment_in = "INSERT INTO comments (comment, commenter, food, foodid, seller) VALUES('$comment','".$_SESSION['users']."','$title','$id','$seller')";
          $mysqli = mysqli_query($conn, $comment_in);
          if ($mysqli) {
            echo '<script type="text/javascript">';
          echo "alert('Thank your feedback')";
          echo '</script>';
          }
        }
      }
      ?>
      <div class="comments">
        <form class="" method="POST">
          <textarea type="text"  class="review" name="comment_body" placeholder="Write your honest review"></textarea><br>
          <input type="submit" name="p_comment" class="comment-review" value="Comment">

             <?php
      $dis = "SELECT * FROM comments WHERE food = '$title' && seller ='$seller'";
      $runit = mysqli_query($conn, $dis);
      while($r = mysqli_fetch_assoc($runit)){;
      ?> 
      <div class="display-comment">
        <h1><?=$r['commenter'];?></h1>
        <p><?=$r['comment'];?></p>

  <?php }?>
      </div>
          </form>
      </div>

    </div>
  </body>
</html>
