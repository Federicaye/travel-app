<?php
use GuzzleHttp\Psr7\Query;

require '../routing/Router.php';
$router = new Router();
require '../routing/routes.php'; 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

/* var_dump(parse_url($_SERVER['REQUEST_URI'])['query']); */

var_dump($parameters);




