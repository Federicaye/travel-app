<?php
include __DIR__ . '/../../models/itinerary.php';
include __DIR__ . '/../../models/locality.php';
include __DIR__ . '/../../models/destination.php';
include __DIR__ . '/../../models/day.php';

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];

$id = explode('=', $parameters);
$id = $id[1];
$itineraryData = Itinerary::show($id);
$localities = locality::index();
$days = day::index($id);
require __DIR__ . '/../../views/itineraries/show.php';
