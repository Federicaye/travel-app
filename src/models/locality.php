<?php

include __DIR__ . '/../../db/connection.php'; 

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
}