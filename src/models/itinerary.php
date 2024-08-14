<?php

include __DIR__ . '/../../db/connection.php'; 

class Itinerary
{


    private static $conn;

    public static function setConnection()
    {
        self::$conn = Database::getConnection();
    }
    public static function index()
    {
        self::setConnection();
        $itineraries = self::$conn->query("SELECT * FROM itineraries");
        return $itineraries->fetch_all(MYSQLI_ASSOC);
    }
    public static function show($id)
    {
        /* $id = $_GET['id']; */
        self::setConnection();
        $itinerary = self::$conn->query("SELECT * FROM itineraries WHERE id = $id");
        return $itinerary->fetch_all();
    }

    public static function update($id)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_GET['id'];
        $sql = "UPDATE itineraries 
        SET title='$title', 
        description='$description',
        image= 'ciao',
        WHERE id=2";
        self::setConnection();
        $itineraries = self::$conn->query($sql);
    }

    public static function delete($id)
    {
        $id = $_GET['id'];
        self::setConnection();
    }

    public static function store($id)
    {
        $id = $_GET['id'];
        self::setConnection();
    }
}
