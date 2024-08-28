<?php
use GuzzleHttp\Psr7\Query;
require '../src/Database.php';
Database::createDatabase();

require '../routing/Router.php';
$router = new Router();
require '../routing/routes.php'; 
$url = parse_url($_SERVER['REQUEST_URI']);
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$parameters = isset($url['query']) ? $url['query'] : null;


$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method, $parameters);

/* var_dump(parse_url($_SERVER['REQUEST_URI'])['query']); 
var_dump($uri);
var_dump($parameters); */ 




