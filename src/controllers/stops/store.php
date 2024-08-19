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

$itinerary_id = $_POST['itinerary_id'];
$locality_name = $_POST['locality_name'];
$locality_description = $_POST['locality_description'];
/* $image = $target_file; */


$sql = "INSERT INTO localities ( name, description, longitude, latitude, image)
VALUES ('$locality_name', '$locality_description', '98.00000000', '88.000000000', 'image')";

  if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  $locality_id = $conn->insert_id;
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 
 
$sql = "INSERT INTO days ( itinerary_id, locality_id, trip_day)
VALUES ('$itinerary_id', '$locality_id', '6')";

  if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 