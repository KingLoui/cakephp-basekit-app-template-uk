<?php

use Cake\Core\Configure;
use Cake\Routing\Router;

Configure::delete('Auth.authenticate.all');
Configure::delete('Auth.authenticate.0');
Configure::delete('Auth.authenticate.2');

$config = [
    'Users' => [
        //Table used to manage users
        'table' => 'Users',
        'RememberMe' => [
            //configure Remember Me component
            'active' => true
        ]
    ],
    'Auth' => [
        'loginRedirect' => [
            'prefix' => false,
            'plugin' => false,
            'controller' => 'pages',
            'action' => 'dashboard'
        ]
    ]
];

return $config;