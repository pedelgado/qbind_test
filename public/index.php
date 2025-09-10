<?php

include '../vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


/**
 * Bootstrap configuration
 */

$container = require '../config/services.php';


/**
 * Very simplistic front controller
 */

// Get URI
$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);
$uri  = trim($uri, '/');

// Default route
if ($uri === '') {
    $uri = 'home';
}

// Build controller name
$controllerClass = 'Pedro\Qbind\app\Controller\\' . ucfirst($uri) . 'Controller';

// Invoke controller
if (class_exists($controllerClass)) {
    $controller = $container->get($controllerClass);
    $controller();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}

