<?php

include __DIR__ . "/public/routing.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$urip = parse_url($_SERVER['REQUEST_URI']);
var_dump($urip);