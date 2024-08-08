<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE IF NOT EXISTS travelapp";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->select_db('travelapp');

$sql = "CREATE TABLE IF NOT EXISTS itineraries (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table trips created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS localities (
      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      longitude DECIMAL(12, 10),
      latitude  DECIMAL(12, 10),
      image VARCHAR(255) NOT NULL,
      description  TEXT 
      
      )";

if ($conn->query($sql) === TRUE) {
  echo "Table cities created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS hotels (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  city_id INT UNSIGNED NOT NULL,
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE CASCADE
  
  )";

if ($conn->query($sql) === TRUE) {
  echo "Table hotels created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS days (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  trip_id INT UNSIGNED NOT NULL,
  city_id INT UNSIGNED NOT NULL,
  order INT UNSIGNED NOT NULL,
  CONSTRAINT FK_trip FOREIGN KEY (trip_id) REFERENCES trips(id) ON DELETE CASCADE,
  CONSTRAINT FK_city FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabella di giunzione days creata con successo<br>";
} else {
  echo "Errore nella creazione della tabella di giunzione days: " . $conn->error . "<br>";
}

