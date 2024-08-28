<?php

include_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../Validator.php';

class day
{
    private static $conn;

    public static function setConnection()
    {
        self::$conn = Database::getConnection();
    }
    public static function index($id)
    {
        $id = (int)$id;
        self::setConnection();
    
        $days = self::$conn->query("SELECT  localities.name AS locality_name,
            days.trip_day  FROM days 
        INNER JOIN trip_destination ON  days.trip_destination_id = trip_destination.id 
        INNER JOIN itineraries ON  trip_destination.itinerary_id = itineraries.id 
        INNER JOIN localities ON  trip_destination.locality_id = localities.id 
        WHERE itineraries.id = $id
        ORDER BY trip_day ASC" 
        );
        return $days->fetch_all(MYSQLI_ASSOC);
    }
    public static function show($id)
    {

        self::setConnection();
       /*  $day = self::$conn->query("SELECT * FROM days WHERE id = $id");
        $day = $day->fetch_all(MYSQLI_ASSOC); */
        $sql = "SELECT * FROM days WHERE id = $id";
        if (self::$conn->query($sql) === TRUE) {
            echo "yes";
        } else {
            echo "Error  " . self::$conn->error;
        }

        self::$conn->close();
    }

    public static function update($trip_day, $id)
    {
        self::setConnection();
        $sql = "UPDATE days 
        SET trip_day = '$trip_day',
        WHERE id=$id";
         if (self::$conn->query($sql) === TRUE) {
            echo "Record updates successfully";
        } else {
            echo "Error updating record: " . self::$conn->error;
        }

        self::$conn->close();
    }

    public static function delete($id)
    {
        self::setConnection();
        $sql = "DELETE FROM days WHERE id=$id";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }

        self::$conn->close();
    }

    public static function store($trip_destination_id, $trip_day, $id)
    {
       
        self::setConnection();
        
        $sql = "INSERT INTO days (trip_destination_id, trip_day) VALUES ('$trip_destination_id', '$trip_day')";
        if (self::$conn->query($sql) === TRUE) {
            echo "stored succesfully";
            header("location: /itinerary?id=" . $id);
            
          } else {
            echo "Error: " . $sql . "<br>" . self::$conn->error;
          } 
        
          self::$conn->close();
    }
}
