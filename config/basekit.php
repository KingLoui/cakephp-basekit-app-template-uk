<?php

use Cake\Core\Configure;
use Cake\Routing\Router;

$config = [
  'BaseKit' => [
      'NavSidebar' => [
        'ShowThemeExamples' => false,
        'ShowThemeSettings' => false,
        'MenuItems' => [
           'Users' => [['uri' => '/admin/users', 'extras' => ['icon' => 'fa fa-user']],
              'All Users' => ['uri' => ['plugin' => false, 'controller' => 'Users', 'action' => 'index']],
              'Add User' => ['uri' => ['plugin' => false, 'controller' => 'Users', 'action' => 'add']]
           ]
        ]
      ]
  ]
];
return $config;
