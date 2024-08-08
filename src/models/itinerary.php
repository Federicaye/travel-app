<?php
//including the database connection file
include $_SERVER['DOCUMENT_ROOT'] . '/travel-app/db/connection.php';

//fetching data in descending order (lastest entry first)

class Trip {
    

    private static $conn;

    public static function setConnection() {
       self::$conn = Database::getConnection();
    }
    public static function index() {
        self::setConnection();
        $trips = self::$conn->query("SELECT * FROM trips");
        return $trips->fetch_all(MYSQLI_ASSOC);
    }

    public function show() {
        $trips = self::$conn->query("SELECT * FROM trips");
        return $trips->fetch_all();
    }
}
