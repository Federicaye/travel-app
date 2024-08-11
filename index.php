<?php

include __DIR__ . "/public/routing.php"; 
include __DIR__ . "/src/views/itineraries/add.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$urip = parse_url($_SERVER['REQUEST_URI']);
var_dump($urip);