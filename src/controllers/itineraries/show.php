<?php


include __DIR__ . '/../../models/itinerary.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
$itinerary = Itinerary::show($id);
echo $parameters;
var_dump($itinerary);
require __DIR__ . '/../../views/itineraries/show.php';
