<?php
use GuzzleHttp\Psr7\Query;

require '../routing/Router.php';
$router = new Router();
require '../routing/routes.php'; 
$url = parse_url($_SERVER['REQUEST_URI']);
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$parameters = isset($url['query']) ? $url['query'] : null;


$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method, $parameters);

/* var_dump(parse_url($_SERVER['REQUEST_URI'])['query']); 
var_dump($uri);
var_dump($parameters); */ 




