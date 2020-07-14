<?php
error_reporting(0);
session_start();
require('db_conn.php');
$session = filter_var($_SESSION['users'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$query = "SELECT * FROM users WHERE sessionid = '$session'" or exit(header('Location: 404.php'));
$fetch = mysqli_query($conn,$query);
if (!$fetch) {
	exit(header('Location: 404.php'));
}
$row = mysqli_fetch_assoc($fetch);






if (!$_SESSION['users']&& !$_SESSION['chef']) {
	exit(header("Location: home.php"));
}
require('navbar.php');
if ($_SESSION['users']) {?>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/profile.css">
	</head>
	<div class="whole">
		<form method="POST">
			<img src="<?=$row['image'];?>" height="150px" width="250px"><br>
			<input type="file" name=""><br>
			<h1 class="firstname">First name:</h1><p class="desc">   <?=$row['firstname'];?></p><br>
			<h1 class="lastname">Last name:</h1><p class="descn">   <?=$row['lastname'];?></p><br>
			<input class="username" type="text" name="username" placeholder="Username"value="<?=$row['username'];?>">
			<h1 class="email">Emial:</h1><p>   <?=$row['email'];?></p>
			<input class="password" type="text" name="password" value="<?=md5($row['password']);?>" placeholder="Password"><br>
			<input class="update" type="submit" name="update" value="Update">
		</form>
	</div>

	<?php





if (isset($_POST['update'])) {
	$password = htmlentities($_POST['password']);
	$username = htmlentities($_POST['username']);
	$target ="image/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	$update = "UPDATE users SET password='$password',username='$username' WHERE sessionid = '$session'";
	$proces = mysqli_query($conn, $update);
}




	if (filter_var($proces, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)) {
		echo "string";
		echo "<meta http-equiv='refresh' content='2' />";
	}else{
		echo "There was a problem updating you profile";
	}
}




if(filter($_SESSION['chef'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)){
	header("Location: home.php");
}
/*
 $sel = "SELECT * FROM chefs";
 $my = mysqli_query($conn, $sel);
 $rows = mysqli_fetch_assoc($my);


 if (isset($_POST['update'])) {
 	 $target ="image/".basename($_FILES['image']['name']);
  $image = $_FILES['image']['name'];
	$password = htmlentities($_POST['password']);
	$username = htmlentities($_POST['username']);
	$dob = htmlentities($_POST['dob']);
	$street = htmlentities($_POST['street']);
	$city = htmlentities($_POST['state']);
	$state= htmlentities($_POST['state']);
	$zip = htmlentities($_POST['zip']);
	$suit = htmlentities($_POST['suit']);
	$position = htmlentities($_POST['position']);
	$price = htmlentities($_POST['price']);
	$areacode = htmlentities($_POST['areacode']);
	$phone = htmlentities($_POST['phone']);
	$description = htmlentities($_POST['description']);



	$ins = "UPDATE chefs SET password = '$password', username = '$username',birth = '$dob',street = '$street',city = '$city',state = '$state',zip = '$zip',suit = '$suite',position='$position',price = '$price',area_code='$areacode',phone='$phone',description='$description' WHERE email = '".$_SESSION['chef']."'";
	$init = mysqli_query($conn, $ins);


	if ($init) {
		echo "Thank you for updating your status";

		echo "<meta http-equiv='refresh' content='2' />";
	}else{
		echo "There was a problem updating your status";
	}
 }else{

 }

	?>

	<link rel="stylesheet" type="text/css" href="css/profile.css">
	</head>
		<div class="whole">
		<form method="POST">
			<img src="<?=$rows['image'];?>" style="margin-bottom: 1em;"height="150px" width="250px"><br>
			<input type="file" name="" style="margin-bottom: 2em;"><br>
			
			<input class="username" type="text" name="username" placeholder="Username"value="<?=$rows['username'];?>">
			<input class="password" type="text" name="password" value="<?=$rows['password'];?>" placeholder="Password">
			<p class="sub-password">Password</p>
			<br>
			<input type="date" class="dob"name="" value="<?=$rows['birth'];?>" placeholder="Date of birth">
			<input type="text" name="street" class="street" value="<?=$rows['street'];?>" placeholder="Street Address"><br>
			<input type="text" name="city" class="city" placeholder="city">
			<input type="text" name="state" class="state" placeholder="State"><br>
			<input type="number" name="zip" placeholder="Zip code" class="zip">
			<input type="number" name="suit" placeholder="Suit/Province" class="suit"><br>
			<input type="text" name="position" placeholder="Current Position" class="position">
			<input type="number" name="price" placeholder="Hourly price" class="price"><br>
			<input type="number" name="areacode" placeholder="Area Code" class="areacode">
			<input type="number" name ="phone" placeholder="Phone" class="phone"><br>
			<textarea placeholder="Description" name="description" class="description"></textarea><br>
			<input class="update" type="submit" class="update"name="update" value="Update">
		</form>
	</div>
	<?php
}*/
?>