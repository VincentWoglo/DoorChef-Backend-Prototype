<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive&amp;display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c146f848ba.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <?php
    error_reporting(0);
    session_start();
    if (!$_SESSION['chef'] && !$_SESSION['users']) {?>
  <div class="nav">
  <form class="" method="GET" action="search.php">
    <a href="home.php"><h1 class="logo">DoorChef</a></h1>
    <input type="text" name="search" class="search" value="<?=$search;?>" placeholder="Search chef, food, location..."><input type="submit" name="" class="searchBtn"value="Search">

    <ul class="right-menu">
      <a href=""><li class="w">What We Do</a></li>
      <a href="login.php"><li class="s"><i class="fas fa-sign-in-alt"></i> Sign in</a></li>
     <a href="signup.php"> <li class="u"><i class="fas fa-user-plus"></i> Sign up</a></li>
    </ul>
  </form>
</div>
<?php
}else{

}


if ($_SESSION['chef']) {?>
    <div class="nav">
    <form class="" method="GET"  action="search.php">
    <a href="home.php"><h1 class="logo">DoorChef</a></h1>
      <input type="text" name="search" class="search" value="<?=$search;?>" placeholder="Search chef, food, location..."><input type="submit" name="" class="searchBtn"value="Search">

      <ul class="right-menu">
        <a href="profile.php"> <li class="w"><i class="fas fa-user"></i> Profile</a></li>
        <!--<a href="message.php"><li class="s"><i class="fas fa-inbox"></i> Messages</a> </li>-->

        <a href="upload.php"><li class="s"><i class="fas fa-plus"></i> Sell Something</a> </li>
        <a href="logoout.php"><li class="u"><i class="fas fa-sign-out-alt"></i>Sign out</a></li>
      </ul>
    </form>
  </div>
  <?php
}else{

}




if ($_SESSION['users']) {?>
    <div class="nav">
    <form class="" method="GET"  action="search.php">
    <a href="home.php"><h1 class="logo">DoorChef</a></h1>
      <input type="text" name="search" class="search" value="<?=$search;?>" placeholder="Search chef, food, location..."><input type="submit" name="" class="searchBtn"value="Search">

      <ul class="right-menu">
        <a href="profile.php"> <li class="w"><i class="fas fa-user"></i> Profile</a></li>
       <!--<a href="message.php"><li class="s"><i class="fas fa-inbox"></i> Messages</a> </li>-->
        <a href="logoout.php"><li class="u"><i class="fas fa-sign-out-alt"></i>Sign out</a></li>
      </ul>
    </form>
  </div>
  <?php

}else{

}
?>
  </body>
</html>
