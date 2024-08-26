<?php

include_once __DIR__ . '/../../db/connection.php';

class destination
{
    private static $conn;

    public static function setConnection()
    {
        self::$conn = Database::getConnection();
    }
    public static function index($id)
    {
        self::setConnection();
        $destinations = self::$conn->query("SELECT * FROM trip_destination WHERE itinerary_id = $id" );
        return $destinations->fetch_all(MYSQLI_ASSOC);
    }
    public static function show($id)
    {

        self::setConnection();
        $itinerary = self::$conn->query("SELECT * FROM itineraries WHERE id = $id");
        $itinerary = $itinerary->fetch_all(MYSQLI_ASSOC);


        $destinations = self::$conn->query("SELECT * FROM trip_destination INNER JOIN localities ON trip_destination.locality_id=localities.id WHERE itinerary_id = $id");
        $destinations = $destinations->fetch_all(MYSQLI_ASSOC);
        return [
            'itinerary' => $itinerary,
            'destinations' => $destinations
        ];
    }

    public static function update($title, $travel_time, $description, $image, $id)
    {
        self::setConnection();
        $sql = "UPDATE itineraries 
        SET title='$title', 
        travel_time = '$travel_time',
        description='$description',
        image= '$image'
        WHERE id=$id";
        self::$conn->query($sql);
    }

    public static function delete($id)
    {
        self::setConnection();
        $sql = "DELETE FROM trip_destination WHERE id=$id";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }

        self::$conn->close();
    }

    public static function store($itinerary_id, $locality_id)
    {
        var_dump($_POST['locality_id']);
        self::setConnection();
        foreach ($locality_id as $id) {
            $integer = (int)$id;
            $sql = "INSERT INTO trip_destination (itinerary_id, locality_id) VALUES ('$itinerary_id', '$id')";
            self::$conn->query($sql) === TRUE;
        }

        
    }
}
