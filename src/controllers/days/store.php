<?php
require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../models/day.php';

$trip_day = $_POST['trip_day'];
$trip_destination_id = $_POST['trip_destination_id'];
$id = $_POST['id'];

Day::store($trip_destination_id, $trip_day, $id);


 