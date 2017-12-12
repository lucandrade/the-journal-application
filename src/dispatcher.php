<?php

$app = require_once APP_PATH . 'app.php';
$router = require_once APP_PATH . 'routes.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);
$dispatcher = $router->getDispatcher();

try {
    $response = $dispatcher->dispatch($httpMethod, $uri);
} catch (\Orno\Http\Exception\NotFoundException $e) {
    $response = $dispatcher->dispatch('GET', '/not-found');
}


return $response;
