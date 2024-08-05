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
}