<?php
session_start();
$errorsUpload= [];
include __DIR__ . '/../../models/itinerary.php';

$target_dir = 'upload/';
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
    $errorsUpload['isImage'] = 'File is not an image';
    $uploadOk = 0;
  }  
}

// Check if file already exists
/* if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
} */

// Check file size
 if ($_FILES["fileToUpload"]["size"] > 500000) {
 $errorsUpload["size"] = 'Sorry, your file is too large.';
  $uploadOk = 0;
} 

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif") {
  $errorsUpload["type"] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['errorsUpload'] = $errorsUpload;
  echo "Sorry, your file was not uploaded.";
  header('location: /itineraries/add');
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
  } else {
    $errorsUpload["otherError"] = 'Sorry, there was an error uploading your file.';
    $_SESSION['errorsUpload'] = $errorsUpload;
  }
}

if ($uploadOk) {

  $title = $_POST['title'];
  $travel_time = $_POST['travel_time'];
  $description = $_POST['description'];
  $image = $target_file;
 
  $response = Itinerary::store($title, $travel_time, $description, $image);
  if (is_array($response)) {
    header("location: /itineraries/add");
  }

  if (!is_array($response)){
    header("location: /itinerary?id=" . $response );
  }
  
 
}

