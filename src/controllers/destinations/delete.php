<?php
include __DIR__ . '/../../models/destination.php';

$id = $_POST['id'];
$id_itinerary_show = $_POST['id_itinerary_show'];
destination::delete($id);
header('location: /itinerary?id=' . $id_itinerary_show);
