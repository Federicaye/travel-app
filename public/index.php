<?php

require '../routing/Router.php';
$router = new Router();
require '../routing/routes.php'; 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
