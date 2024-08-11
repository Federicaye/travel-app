<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => '../src/views/itineraries/add.html',
    '/public/index.php' => '../src/views/itineraries/add.html',
];

if (array_key_exists($uri, $routes)) {
    echo 'ciao 2';
    echo realpath($routes['/']);
    require $routes[$uri];
}

?>


<p>ciao</p>