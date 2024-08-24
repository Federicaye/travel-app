<?php
include __DIR__ . '/../../models/itinerary.php';


$id = $_POST['id'];
Itinerary::delete($id);
echo 'delete itinerary';
header("location: /itineraries/list" );
/* require __DIR__ . '/../../views/itineraries/index.php';  */