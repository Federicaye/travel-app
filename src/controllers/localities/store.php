<?php

include __DIR__ . '/../../models/locality.php';
require __DIR__ . '/../../../vendor/autoload.php';
use GuzzleHttp\Client;

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

$locality_name = $_POST['locality_name'];
$locality_description = $_POST['locality_description'];
$image = $target_file;

$client = new Client([
  // Base URI is used with relative requests
  'base_uri' => 'https://api.tomtom.com/search/2/geocode/',
  // You can set any number of default request options.
  'timeout'  => 2.0,
  'verify' => false,
]);  

$response = $client->request('GET', "{$locality_name}.json", [
  'query' => [
    'key' => 'MqZHrYthLN7RSxSAN8jGZFCldqWYoi99'
  ]
]);

$body = (string) $response->getBody();
$jsonData = json_decode($body, true);

$lat = $jsonData['results'][0]['position']['lat'];
$lon = $jsonData['results'][0]['position']['lon'];

$last_id = locality::store($locality_name, $image, $locality_description, $lon, $lat);
header("location: /locality?id=" . $last_id );
 
}
