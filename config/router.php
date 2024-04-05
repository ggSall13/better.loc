<?php

require_once CONFIG . '/routes.php';

// $uri = trim( parse_url($_SERVER['REQUEST_URI'])['path'], '/' );
$uri = $_GET['act'];

if (array_key_exists($uri, $routes)) {
   require_once CONTROLLERS . "/{$routes[$uri]}";
   die();
} else {
   die('404 Error');
}
