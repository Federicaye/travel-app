<?php
include_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../Validator.php';

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


        $destinations = self::$conn->query("SELECT trip_destination.id,
        trip_destination.itinerary_id,
        trip_destination.locality_id,
        localities.name,
        localities.description,
        localities.image
        FROM trip_destination INNER JOIN localities ON trip_destination.locality_id=localities.id WHERE itinerary_id = $id");
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
        $sql = "DELETE FROM itineraries WHERE id=$id";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }

        self::$conn->close();
    }

    public static function store($title, $travel_time, $description, $image)
    {
        self::setConnection();

        $errors = [];

        if (!Validator::string($title, 1, 100)) {
            $errors['title'] = 'the length of the title should be between 1 and 100 characters';
        }

        if (!Validator::integer($travel_time, 1, 60)) {
            $errors['travel_time'] = 'travel time must be between 1 and 60 days';
        }

        if (!Validator::string($description, 0, 600)) {
            $errors['description'] = 'the length of the description must be less than 600 characters';
        }

        if (!Validator::string($image, 1, 200)) {
            $errors['image'] = 'image is required';
        }

        if (empty($errors)) {
            $sql = "INSERT INTO itineraries (title, travel_time, description, image) 
                    VALUES ('$title', '$travel_time', '$description', '$image')";

                if (self::$conn->query($sql) === TRUE) {

                $last_id = self::$conn->insert_id;
                return $last_id;
            }
        }

        return $errors;

    }
}
