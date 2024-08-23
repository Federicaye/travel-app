<?php
include __DIR__ . '/../../models/itinerary.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
echo '$id';
Itinerary::delete($id);
echo 'delete itinerary';
/* header("location: /itineraries/list" ); */
/* require __DIR__ . '/../../views/itineraries/index.php';  */