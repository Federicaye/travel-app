<?php

$parameters = parse_url($_SERVER['REQUEST_URI'])['query'];
echo $parameters;
echo 'ciao';