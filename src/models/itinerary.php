<?php
//including the database connection file
require_once __DIR__ . '../../../db/connection.php';

//fetching data in descending order (lastest entry first)

class Trip {
    

    private static $conn;

    public static function setConnection() {
       self::$conn = Database::getConnection();
    }
    public static function index() {
        $trips = self::$conn->query("SELECT * FROM trips");
        return $trips->fetch_all();
    }
}
