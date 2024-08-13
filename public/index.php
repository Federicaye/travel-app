<?php
/* include __DIR__ . "/../db/db.php"; */
/* include __DIR__ . "/routing.php"; */

require '../routing/Router.php';
$router = new Router();
require '../routing/routes.php'; 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
echo $method;
echo $uri;