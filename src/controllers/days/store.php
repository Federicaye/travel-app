<?php
require __DIR__ . '/../../../vendor/autoload.php';

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

$trip_day = $_POST['trip_day'];
$trip_destination_id = $_POST['trip_destination_id'];
$id = $_POST['id'];

$sql = "INSERT INTO days ( trip_destination_id, trip_day)
VALUES ('$trip_destination_id', '$trip_day')";

  if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location: /itinerary?id=" . $id);
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 
 