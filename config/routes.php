<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->fallbacks('DashedRoute');
});

Router::prefix('admin', function ($routes) {
 
    $routes->connect('/', ['plugin' => false, 'controller' => 'Pages', 'action' => 'display','dashboard']);

    $routes->fallbacks(DashedRoute::class);
});

Router::connect(
    '/login',
    ['controller' => 'Users', 'action' => 'login']
);

Router::connect(
    '/logout',
    ['controller' => 'Users', 'action' => 'logout']
);

Router::connect(
    '/dashboard',
    ['controller' => 'Pages', 'action' => 'display', 'dashboard']
);

Plugin::routes();
