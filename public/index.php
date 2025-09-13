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

// Get path
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = explode("/", $path);
$path = end($path);

// Default route
if ($path === '') {
    $path = 'home';
}

// Build controller name based of the path
$controllerClass = 'Pedro\Qbind\app\Controller\\' . ucfirst($path) . 'Controller';

// Try to invoke controller
if (class_exists($controllerClass)) {
    $controller = $container->get($controllerClass);
    $controller();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}

