<?php

class Database
{
    private static $conn;
    public static function getConnection()
    {

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

        return $conn;
    }

    public static function createDatabase()
    {
        $conn = self::getConnection();

        $sql = "CREATE DATABASE IF NOT EXISTS travelapp";
        if ($conn->query($sql) === TRUE) {
           /*  echo "Database created successfully"; */
        } else {
            echo "Error creating database: " . $conn->error;
        }

        $conn->select_db('travelapp');

        $sql = "CREATE TABLE IF NOT EXISTS itineraries (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        travel_time TINYINT UNSIGNED NOT NULL,
        image VARCHAR(255) NOT NULL,
        description TEXT
        )";

        if ($conn->query($sql) === TRUE) {
           /*  echo "Table itinerarys created successfully"; */
        } else {
           /*  echo "Error creating table: " . $conn->error; */
        }

        $sql = "CREATE TABLE IF NOT EXISTS localities (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        longitude DECIMAL(12, 10),
        latitude  DECIMAL(12, 10),
        image VARCHAR(255) NOT NULL,
        description  TEXT)";

        if ($conn->query($sql) === TRUE) {
          /*   echo "Table localities created successfully"; */
        } else {
            echo "Error creating table: " . $conn->error;
        }


        $sql = "CREATE TABLE IF NOT EXISTS trip_destination (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            itinerary_id INT UNSIGNED NOT NULL,
            locality_id INT UNSIGNED NOT NULL,
            CONSTRAINT FK_itinerary FOREIGN KEY (itinerary_id) REFERENCES itineraries(id) ON DELETE CASCADE,
            CONSTRAINT FK_locality FOREIGN KEY (locality_id) REFERENCES localities(id) ON DELETE CASCADE,
            CONSTRAINT itinerary_locality UNIQUE (itinerary_id, locality_id)
          )";
          
          if ($conn->query($sql) === TRUE) {
           /*  echo "Tabella di giunzione trip_datination creata con successo<br>"; */
          } else {
            echo "Errore nella creazione della tabella di giunzione trip_dastination: " . $conn->error . "<br>";
          }

          $sql = "CREATE TABLE IF NOT EXISTS days (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            trip_destination_id INT UNSIGNED NOT NULL,
            trip_day TINYINT UNSIGNED NOT NULL,
            CONSTRAINT FK_trip_destination FOREIGN KEY (trip_destination_id) REFERENCES trip_destination(id) ON DELETE CASCADE,
            CONSTRAINT trip_day UNIQUE (trip_day, trip_destination_id)
            
          )";
          
          if ($conn->query($sql) === TRUE) {
          /*   echo "Tabella di giunzione days creata con successo<br>"; */
          } else {
            echo "Errore nella creazione della tabella di giunzione days: " . $conn->error . "<br>";
          } 

    }
}