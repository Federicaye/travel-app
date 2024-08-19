<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "travelapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "error";
  die("Connection failed: " . $conn->connect_error);

}

$target_dir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

   
}

// Check if file already exists
/* if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
} */

// Check file size
/* if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
} */

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


if ($uploadOk) {

  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $target_file;


  $sql = "INSERT INTO itineraries ( title, description, image)
  VALUES ('$title', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  } 
   
  header('location: /itineraries/show' );
  /* require __DIR__ .'/../../views/itineraries/show.php'; */
  $conn->close();
}

/* var_dump($target_file);
var_dump($target_dir);
var_dump(is_dir($target_dir));
var_dump(is_dir('../../../public/image'));
var_dump(__DIR__); */


