<?php
//create connection
$domain = htmlentities("localhost");
$localhost = filter_var($domain, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$username = htmlentities("id12568507_doorchef");
$root = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$name = htmlentities ("id12568507_doorchef");
$db_name = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$space = trim("DoorChef");
$conn = mysqli_connect($localhost,$root,$space,$name) or die();
//prevent XSS

if (filter_var(!$conn,FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)) {
  exit(header('Location: 404.php'));
}
 ?>
