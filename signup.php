<?php
error_reporting(0);
session_start();
require('db_conn.php');
$error = array();
if (isset($_POST['signup'])) {
$firstname =  htmlentities($_POST['firstname']);
$lastname =  htmlentities($_POST['lastname']);
$email =  htmlentities($_POST['email']);
$username =  htmlentities($_POST['username']);
$agreement =  htmlentities($_POST['agreement']);
$password =  htmlentities(md5($_POST['password']));
$sessionid = md5($_POST['email']);
  if (empty($firstname)) {
    array_push($error,"First name is required");
  }if (empty($lastname)) {
    array_push($error,"Last name is required");
  }if (empty($email)) {
    array_push($error,"Email is required");
  }if (empty($username)) {
    array_push($error,"Username is required");
  }if (empty($password)) {
    array_push($error,"Password is required");
  }
  if (empty($agreement)) {
    array_push($error,"Agreement is required");
  }


  if (count($error)>0) {
    foreach ($error as $key) {?>
      <div class="error"><?php echo $key;?></div>
      <?php
    }
  }


  else{
      $check = "SELECT * FROM users WHERE email='$email'";
    $take = mysqli_query($conn, $check);
  if (mysqli_num_rows($take)>0) {?>
      <div class="error">User Already Exist</div>
      <?php
    }

    if (mysqli_num_rows($take)<1 && count($error)<1) {

    $query = "INSERT INTO users(sessionid,firstname, lastname, username, password, email,agreement)
     VALUES ('$sessionid','$firstname','$lastname','$username','$password','$email','AGREED')";
     $mysqli = mysqli_query($conn, $query);
     $_SESSION['users'] = $sessionid;
    }
  }


  if ($_SESSION['users']) {
    header('Location: home.php');
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
    <title>Sign Up -DoorChef</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="whole" method="POST">
       <a href="home.php"><h1 class="logo">DoorChef</a></h1>
        <p class="description">Open your free DoorChef account</p>
        <input type="text" name="firstname" class="firstname" placeholder="First name"><br>
          <input type="text" name="lastname" class="lastname" placeholder="Last name"><br>
        <input type="email" name="email" class="email" placeholder="Email"><br>
            <input type="text" name="username" class="username" placeholder="Username"><br>
                <input type="password" name="password" class="password" placeholder="Password"><br>

                <input type="checkbox" name="agreement" class="agreement">
                <p class="agreed"> By clicking sign up, you have agree that you've read our <a href="#">Terms Of Use</a>  and <a href="#"> Privacy Policy</a></p> <br>
                  <input type="submit" name="signup" class="signup" value="Sign Up"><br>
                  <p class="have-account">Already have an account?</p>
                  <a href="login.php"><input type="button" name="" class="signin" value="Log in"></a>
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
