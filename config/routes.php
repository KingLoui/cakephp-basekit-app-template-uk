<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
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
    ['controller' => 'Users', 'action' => 'login'],
    ['_name' => 'login']
);

Router::connect(
    '/dashboard',
    ['controller' => 'Pages', 'action' => 'display', 'dashboard']
);

Router::connect('/admin/users/login', ['_name' => 'login']);


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
