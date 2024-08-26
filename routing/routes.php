<?php


$router->get('/', '../src/views/itineraries/add.php'); 

//vista aggiungi itinerario
$router->get('/itineraries/add','../src/views/itineraries/add.php');
$router->post('/itineraries/store', '../src/controllers/itineraries/store.php');



$router->get('/itineraries/list', '../src/views/itineraries/index.php');
$router->get('/itinerary', '../src/controllers/itineraries/show.php');
$router->delete('/itineraries/delete', '../src/controllers/itineraries/delete.php');
$router->get('/itineraries/edit', '../src/views/itineraries/edit.php');
$router->patch('/itineraries/update', '../src/controllers/itineraries/update.php');



//DAYS
//ADD
$router->post('/days/store', '../src/controllers/days/store.php');

$router->post('/localities/store', '../src/controllers/localities/store.php');
$router->get('/localities/list','../src/views/localities/index.php');
$router->get('/localities/add','../src/views/localities/add.php');
$router->get('/locality', '../src/views/localities/show.php');

$router->post('/destinations/store', '../src/controllers/destinations/store.php');
$router->delete('/destinations/delete', '../src/controllers/destinations/delete.php');