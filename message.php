<?php
if (isset($_POST['send'])) {
	session_start();
	$_GET['title'];
	$_GET['id'];
	$_GET['seller'];
	$message = $_POST['message'];
	if (empty($message)) {

	}else{

	}

	}
	if ($_SESSION['users'] OR $_SESSION['chef'] ) {
		header("Location: home.php");
	}else{
		header("Location: home.php");
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/message.css">
		<script src="https://kit.fontawesome.com/c146f848ba.js" crossorigin="anonymous"></script>
		<title></title>
		<?php require('navbar.php'); ?>
	</head>
	<body>
		<div class="new">
		<div class="top">

		</div>
		<div class="message">
			<div class="top-title">

			</div>
			<div class="message-display">

			</div>
			<form class="" method="POST">
				<input type="text" class="message-input" name="message" placeholder="Press 'Enter'w to send a message" >   <i style="font-size: 1.5em; color: #1dbf73;" name="send"class="fas fa-paper-plane"></i>
			</form>
		</div>
	</div>
	</body>
</html>
