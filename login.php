<?php
error_reporting(0);
session_start();
require('db_conn.php');
$error = array();
if (isset($_POST['signin'])) {
  $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = trim(htmlentities(md5($_POST['password'])));
  $sessionid = md5($_POST['email']);
  if (empty($email)) {
    array_push($error, "Email is required");
  }
  if (empty($password)) {
    array_push($error, "Password is required");
  }

  if (count($error)>0) {
    foreach ($error as $key) {?>
      <div class="error"><?php echo $key;?></div>
    <?php
    }
  } else{
    $sel = "SELECT * FROM users WHERE email = '$email' && password = '$password' " or die();
    $exec = mysqli_query($conn, $sel);
    if (!$exec) {
     header("Location: 404.php");
    }
    $row = mysqli_fetch_array($exec);
    $db_email = filter_var($row['email'], FILTER_VALIDATE_EMAIL);
    $db_password = $row['password'];



}
    //chef

    $chef = "SELECT * FROM chefs WHERE email = '$email' && password = '$password' " OR die();
    $in = mysqli_query($conn, $chef);
    $rows = mysqli_fetch_array($in);
    $chef_db_email = $rows['email'];
    $chef_db_password = $rows['password'];





    if ($email = $db_email && $password = $db_password) {
      $_SESSION['users'] = $sessionid;
      header("Location: home.php");
    }
     elseif ($email = $chef_db_email && $password = $chef_db_password ) {
      $_SESSION['chef'] = $email;
      header("Location: home.php");
    }
    else{
      echo "<div>";
      echo "Please check your email or password";
      echo "</div>";
    }








  }



  if ($_SESSION['users'] OR $_SESSION['chef']) {
  header('Location: home.php');
}else {

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in - DoorChef</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive&display=swap" rel="stylesheet">
  </head>
  <body>
<div class="container">
  <a href="home.php"><h1 class="logo">DoorChef</a></h1>
  <form method="POST">
<input type="email" name="email" class="email" placeholder="Email address (Required)"><br>
<input type="password" name="password" class="password" placeholder="Password (Required)"><br>
<a href="#"><p class="forgot">Forgot password?</a> </p>
<input type="checkbox" class="checkbox" name=""><p class="keep-signin">Keep me signed in</p><br>
<input type="submit" class="signin"name="signin" value="Sign In">
<p class="need-account">Don't have an account?</p>

<a href="signup.php"><input type="button" name="signup" class="signup" value="Create An Account"></a>
<h1 class="or" style="font-size: 1rem; margin-top: 1em;">OR</h1>
<a href="chefsignup.php"><input type="button" name="signup" class="signupc" value="Create A Chef Account"></a>
</form>
</div>
<div class="footer">
  <div class="whole">
    <ul class="footer-menu">
      <li class="terms">Terms of Use</li>
        <li  class="privacy">Privacy Policy</li>
          <li class="about">About</li>
            <li class="help">Help</li>
              <li class="copy">&copy; 2020 DoorChef.</li>
    </ul>
  </div>
</div>
  </body>
</html>
