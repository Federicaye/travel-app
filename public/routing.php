<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => '/../src/views/itineraries/add.php',
    '/public/index.php' => '../src/views/itineraries/add.html',
];

if (array_key_exists($uri, $routes)) {
    echo 'ciao 2';
   include __DIR__ . $routes[$uri];
    echo $routes[$uri];
}


include __DIR__ . "/../src/views/itineraries/add.php";
?>


<p>ciao</p>