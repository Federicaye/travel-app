<?php


$router->get('/', '../src/views/itineraries/add.php'); 
$router->get('/ciao','../src/views/itineraries/ciao.php');
//vista aggiungi itinerario
$router->get('/itineraries/add','../src/views/itineraries/add.php');
$router->post('/itineraries/create', '../src/controllers/itineraries/add.php');


//index
$router->get('/itineraries/list', '../src/views/itineraries/index.php');
//show 
$router->get('/itinerary', '../src/controllers/itineraries/show.php');


$router->get('/localities/add','../src/views/localities/add.php');
$router->post('/localities/create', '../src/controllers/itineraries/add.php');

//DAYS
//ADD
$router->post('/stops/store', '../src/controllers/stops/store.php');