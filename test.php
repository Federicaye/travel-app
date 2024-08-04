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

$stmt = $conn->prepare("INSERT INTO trips (title, description, image) VALUES (?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Set parameters and execute
$title = 'title';
$description = 'description';
$image = 'image';
$stmt->bind_param("sss", $title, $description, $image);

if ($stmt->execute() === false) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
} else {
    echo "New record created successfully";
}