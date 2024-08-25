<?php

include_once __DIR__ . '/../../db/connection.php'; 

class locality
{

    private static $conn;

    public static function setConnection()
    {
        self::$conn = Database::getConnection();
    }

    public static function getCoordinetes() 
    {

    }

    public static function index()
    {
        self::setConnection();
        $localities = self::$conn->query("SELECT * FROM localities");
        return $localities->fetch_all(MYSQLI_ASSOC);
    }


    public static function show($id)
    {

        self::setConnection();
        $locality = self::$conn->query("SELECT * FROM localities WHERE id = $id");
        $locality = $locality->fetch_all(MYSQLI_ASSOC);

        return  $locality;
    }

    public static function store($name, $image, $description, $longitude, $latitude)
    {
        self::setConnection();
        $sql = "INSERT INTO localities (name, image, description, longitude, latitude) VALUES ('$name', '$image', '$description', '$longitude', '$latitude')";

        if (self::$conn->query($sql) === TRUE) {

            $last_id = self::$conn->insert_id;
            return $last_id;
        }
    }

}