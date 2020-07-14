<?php
require('db_conn.php');
  if (isset($_POST['upload'])) {
  $target ="image/".basename($_FILES['image']['name']);
  $image = $_FILES['image']['name'];

  $sql = "INSERT INTO products (image)VALUES ('$image')";
  $mysqli = mysqli_query($conn, $sql);
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    header("Location: success-upload.php");
  }
  else{
    $problem = "problem";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
 
  <form method="POST" enctype="multipart/form-data">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>