<?php


$router->get('/', '../src/views/itineraries/add.php'); 
$router->get('/ciao','../src/views/itineraries/ciao.php');
$router->get('/add/itinerary','../src/views/itineraries/add.php');
$router->post('/create', '../src/controllers/itineraries/add.php');


$router->get('/itineraries/list', '../src/views/itineraries/index.php');
$router->get('/itinerary', '../src/controllers/itineraries/show.php');