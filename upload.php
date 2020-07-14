<?php
session_start();
$error = array();
require('navbar.php');
require('db_conn.php');
if (isset($_POST['publish'])) {
  $target ="image/".basename($_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  $title = $_POST['title'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $foodtype = $_POST['foodtype'];

  if (empty($title)){
    array_push($error,"Title is required");
  }
   if (empty($city)){
    array_push($error,"City is required");
  }
   if (empty($state)){
    array_push($error,"State is required");
  }
   if (empty($price)){
    array_push($error,"Price is required");
  }
   if (empty($description)){//446 char
    array_push($error,"Description is required");
  }

//check for error

  if (count($error)>0) {
    foreach ($error as $key) {?>
    <div><?php echo $key; ?></div>
      <?php
    }
  }



  else{
    //insert data into the db
    $data = "INSERT INTO products(title, city, state, price,foodtype, description,image,soldby) VALUES ('$title','$city','$state','$price','$foodtype','$description','$image','".$_SESSION['chef']."')";
    $insert = mysqli_query($conn, $data);
    

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo '
    <script type="text/javascript">
      alert("Gig published successfully");
    </script>';
    }else{
       echo '
    <script type="text/javascript">
      alert("There was problem publishing your gig");
    </script>';
    }

  }






}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sell a gig - DoorChef</title>
    <link rel="stylesheet" href="css/upload.css">
  </head>
  <script defer src="image.js"></script>
  <body>
    <div class="containe">
      <form class="" method="POST" enctype="multipart/form-data">


      <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="file-upload">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

  <div class="image-upload-wrap">
    <input class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" required="" />
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>

    </div>
  </div>
</div>



<input type="text" class="title" name="title" placeholder="What are you selling?"><br>
<select class="foodtype" name="foodtype">
  <option>Food type</option>
  <option>Vegan</option>
  <option>Meat</option>
  <option>Pescaterian</option>
</select>
<input type="number" name="price" class="price" placeholder="Price ex. $12"><br>
<input type="text" name="city" class="city"placeholder="City">
<input type="text" name="state" class="state" placeholder="State"><br>
<textarea type="text" name="description" class="description"placeholder="Description (Min of 700 characters)"></textarea><br>
<input type="checkbox" name="checkbox" class="agreement">

<p class="agreed">By posting, you confirm that this listing complies with DoorChef's Commerce Policies
   and all applicable laes. <a href="#">Learn More</a> </p><br>
<input type="submit" name="publish" class="publish" value="Publish Gig">
</div>
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
