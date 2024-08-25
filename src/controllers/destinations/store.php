<?php
include __DIR__ . '/../../models/destination.php';
$locality_id = $_POST['locality_id'];
$itinerary_id = $_POST['itinerary_id'];
destination::store($itinerary_id, $locality_id);