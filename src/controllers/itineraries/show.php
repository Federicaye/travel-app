<?php
include __DIR__ . '/../../models/itinerary.php';
include __DIR__ . '/../../models/locality.php';
include __DIR__ . '/../../models/destination.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
$itineraryData = Itinerary::show($id);
$localities = locality::index();

require __DIR__ . '/../../views/itineraries/show.php';
