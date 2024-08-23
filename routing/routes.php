<?php


$router->get('/', '../src/views/itineraries/add.php'); 

//vista aggiungi itinerario
$router->get('/itineraries/add','../src/views/itineraries/add.php');
$router->post('/itineraries/store', '../src/controllers/itineraries/store.php');



$router->get('/itineraries/list', '../src/views/itineraries/index.php');
$router->get('/itinerary', '../src/controllers/itineraries/show.php');
$router->post('/itineraries/delete', '../src/controllers/itineraries/delete.php');
$router->get('/itineraries/edit', '../src/views/itineraries/edit.php');

$router->get('/localities/list','../src/views/localities/index.php');


//DAYS
//ADD
$router->post('/stops/store', '../src/controllers/stops/store.php');