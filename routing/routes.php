<?php


$router->get('/', '../src/views/itineraries/add.php'); 
$router->get('/ciao','../src/views/itineraries/ciao.php');
$router->get('/itineraries/add','../src/views/itineraries/add.php');
$router->post('/itineraries/create', '../src/controllers/itineraries/add.php');

$router->get('/itineraries/show', '../src/views/itineraries/show.php'); 

$router->get('/itineraries/list', '../src/views/itineraries/index.php');
$router->get('/itinerary', '../src/controllers/itineraries/show.php');


$router->get('/localities/add','../src/views/localities/add.php');
$router->post('/localities/create', '../src/controllers/itineraries/add.php');