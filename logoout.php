<?php
session_start();
unset($_SESSION['users']);
unset($_SESSION['chef']);


if (!$_SESSION['chef']) {
	header("Location: login.php");
}else{
	die('There was a problem logging you out');
}




if (!$_SESSION['users']) {
	header("Location: login.php");
}else{
	die('There was a problem logging you out');
}
?>