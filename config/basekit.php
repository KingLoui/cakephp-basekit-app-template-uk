<?php

use Cake\Core\Configure;
use Cake\Routing\Router;

$config = [
  'BaseKit' => [
      'NavSidebar' => [
        'ShowThemeExamples' => false,
        'ShowThemeSettings' => false,
        'MenuItems' => [
           __('Users') => [['uri' => '/admin/users', 'extras' => ['icon' => 'fa fa-user']],
              __('All users') => ['uri' => ['plugin' => false, 'controller' => 'Users', 'action' => 'index']],
              __('Add user') => ['uri' => ['plugin' => false, 'controller' => 'Users', 'action' => 'add']]
           ]
        ]
      ]
  ]
];
return $config;
