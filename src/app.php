<?php

$container = new Orno\Di\Container;
$container->add('App\Http\ClientInterface', function () {
    return new App\Http\ClientGuzzle();
});

$container->add('App\Repositories\RepositoryInterface', function () use ($container) {
    return new App\Repositories\RepositoryHttp($container->get('App\Http\ClientInterface'));
});

return $container;
