<?php
//including the database connection file
require_once ("db/connection.php");

//fetching data in descending order (lastest entry first)

class Trip {
    

    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }
    public function index() {
        $trips = $this->conn->query("SELECT * FROM trips");
    }
}
