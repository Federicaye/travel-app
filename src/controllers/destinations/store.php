<?php
session_start();
include __DIR__ . '/../../models/destination.php';
$locality_id = $_POST['locality_id'];
$itinerary_id = $_POST['itinerary_id'];
$destinationsAdded = destination::store($itinerary_id, $locality_id);
$_SESSION['destinationsAdded'] = $destinationsAdded;
header('location: /itineraries/show?id=' . $itinerary_id);