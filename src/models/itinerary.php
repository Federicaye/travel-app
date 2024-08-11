<?php

include $_SERVER['DOCUMENT_ROOT'] . '/travel-app/db/connection.php';


class Trip
{


    private static $conn;

    public static function setConnection()
    {
        self::$conn = Database::getConnection();
    }
    public static function index()
    {
        self::setConnection();
        $trips = self::$conn->query("SELECT * FROM trips");
        return $trips->fetch_all(MYSQLI_ASSOC);
    }
    public static function show($id)
    {
        $id = $_GET['id'];
        self::setConnection();
        $trips = self::$conn->query("SELECT * FROM trips WHERE id = $id");
        return $trips->fetch_all();
    }

    public static function update($id)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_GET['id'];
        $sql = "UPDATE trips 
        SET title='$title', 
        description='$description',
        image= 'ciao',
        WHERE id=2";
        self::setConnection();
        $trips = self::$conn->query($sql);
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
