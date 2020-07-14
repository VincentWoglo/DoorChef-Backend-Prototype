<?php
session_start();
require('db_conn.php');
require('navbar.php');
$error = array();
if (isset($_POST['signup'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  $password = md5($password);
  $re_password = md5($re_password);
  $birth = $_POST['birth'];
  $city = $_POST['city'];
  $state= $_POST['state'];
  $zip = $_POST['zip'];
  $education = $_POST['education'];
  $position = $_POST['position'];
  $price= $_POST['price'];
  $gender = $_POST['gender'];
  $street = $_POST['$street'];
  $zip = $_POST['zip'];
  $suit = $_POST['suit'];
  $area = $_POST['area'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];
  $agreement = $_POST['agreement'];
  if (empty($firstname)&&empty($lastname)&&empty($email)&&empty($username)&&empty($password)
  &&empty($re_password)&&empty($birth)&&empty($city)&&empty($state)&&empty($zip)
  &&empty($education)&&empty($position)&&empty($price) &&empty($gender)&&empty($street)&&empty($zip)&&empty($suit)&&empty($area)&&empty($phone)&&empty($description)&&empty($agreement)) {
    array_push($error,"Please complete all empty fields");
  }
  if (count($error)>0) {
    foreach ($error as $key) {?>
      <div><?php echo $key?></div>
      <?php
    }
  }
  else{
    $check = "SELECT * FROM chefs WHERE email='$email'";
    $take = mysqli_query($conn, $check);
  if (mysqli_num_rows($take)>0) {?>
      <div class="error">User Already Exist</div>
      <?php
    }
    if (mysqli_num_rows($take)<1 && count($error)<1 && $password = $re_password) {
      //insert data and create a session
      $query = "INSERT INTO chefs(firstname, lastname, email, password, re_password, username, birth, gender, street, city, zip, suit, state, country, education, current_position, price, area_code, phone_number, description, agreement) VALUES ('$firstname','$lastname','$email','$password','$re_password','$username','$birth','$gender','$street','$city','$zip','$suit','$state','$country','$education','$position','$price','$area','$phone','$description','AGREED')";
      $store = mysqli_query($conn, $query);
     
    }
    if ($store) {
      $_SESSION['chef'] = $email;
      header('Location: home.php');
    }
  }
}
if ($_SESSION['users'] && $_SESSION['chef']) {
  header('Location: home.php');
}else{

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/chefsignup.css">
  </head>
  <body>
    <div class="containe">
      <div class="registration">
        <form class="" method="POST">
           <p class="describe">Open your free chef account</p>
          <input type="text" name="firstname" class="firstname" placeholder="First name">
            <input type="text" name="lastname" class="lastname" placeholder="Last name">
            <br>
              <input type="email" name="email" class="email" placeholder="Email"><br>
                <input type="password" name="password" class="password"placeholder="Password">
                 <input type="password" name="re_password" class="re-password"placeholder="Re-Password"><br>
              <input type="text" name="username" class="username" placeholder="Username"><br>
                      <input type="date" name="birth" class="birth"placeholder="Date of Birth">

                      <select class="gender" name="gender">
                        <option>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                      <p class="date-title">Date of Birth</p>
                      <input type="text" name="street" class="street" placeholder="Street Address">
                        <input type="text" name="city" class="city"placeholder="City"><br>
                            <input type="number" name="zip" class="zip"placeholder="Zip code">
                            <input type="number" class="suit"name="suit" placeholder="suit/province"><br>

                              <input type="text" name="state" class="state" placeholder="State">
                            <select class="Country" name="country">
                              <option>Country</option>
                              <option>United states</option>
                            </select><br>
                              <input type="text" name="education" class="education"placeholder="Education"><br>
                                <input type="text" name="position" class="position"placeholder="Current Job Position">
                              <input type="number" name="price" class="price" placeholder="Price ex. $12"><br>
                              <input type="number" name="area" class="area"placeholder="Area Code"> &dash;
                                <input type="number" name="phone" class="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone numer"><br>
                                <textarea name="description" class="description" name="description" placeholder="Describe yourself">
                                </textarea><br>
                                <input type="checkbox" name="agreement" class="agreement">
                                <p class="agreed"> By clicking sign up, you have agree that you've read our chef <a href="#">Terms Of Use</a>  and <a href="#"> Privacy Policy</a></p> <br>

                            <input type="submit" class="signup"name="signup" value="Sign up"><br>
                          <p class="already-title">Already have an account?</p><br>
                        <input type="submit" class="signin"name="signin" value="Sign in">

        </form>
      </div>
    </div>
  </body>

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
</html>
