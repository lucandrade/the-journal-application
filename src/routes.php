<?php

use Orno\Route\RouteStrategyInterface;
use Orno\Route\RouteCollection;

$router = new RouteCollection($app);
$router->setStrategy(RouteStrategyInterface::METHOD_ARGUMENT_STRATEGY);

$router->get('/', 'App\Controllers\Rivers::get');
$router->get('/google', 'App\Controllers\Tags::get');
$router->get('/not-found', 'App\Controllers\NotFound::get');

return $router;
