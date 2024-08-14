<?php


include __DIR__ . '/../../models/itinerary.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
Itinerary::show($parameters);
/* echo $parameters; */
echo $id[1];
