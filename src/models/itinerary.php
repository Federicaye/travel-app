<?php

include __DIR__ . '/../../db/connection.php';

class itinerary
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

        self::setConnection();
        $itinerary = self::$conn->query("SELECT * FROM itineraries WHERE id = $id");
        $itinerary = $itinerary->fetch_all(MYSQLI_ASSOC);


        $stops = self::$conn->query("SELECT * FROM days INNER JOIN localities ON days.locality_id=localities.id WHERE itinerary_id = $id");
        $stops = $stops->fetch_all(MYSQLI_ASSOC);
        return [
            'itinerary' => $itinerary,
            'stops' => $stops
        ];
    }

    public static function update($title, $description, $image, $id)
    {
       
        $sql = "UPDATE itineraries 
        SET title='$title', 
        description='$description',
        image= '$image',
        WHERE id=$id";
        self::setConnection();
        self::$conn->query($sql);
    }

    public static function delete($id)
    {
        self::setConnection();
        $sql = "DELETE FROM itineraries WHERE id=$id";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }

        self::$conn->close();
    }

    public static function store($title, $description, $image)
    {
        self::setConnection();
        $sql = "INSERT INTO itineraries (title, description, image) VALUES ('$title', '$description', '$image')";

        if (self::$conn->query($sql) === TRUE) {

            $last_id = self::$conn->insert_id;
            return $last_id;
        }
    }
}
