<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => '/../src/views/itineraries/add.php',
    '/ciao' => '/../src/views/itineraries/add.php',
];

if (array_key_exists($uri, $routes)) {
    echo 'YES';
    include __DIR__ . $routes[$uri];
    echo $routes[$uri];
}

?>

<p>ROUTING</p>