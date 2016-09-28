<?php

use Cake\Core\Configure;
use Cake\Routing\Router;

$config = [
  'BaseKit' => [
      'NavSidebar' => [
        'HeaderElement' => 'adminbar',
        'HeaderLogo' => 'UK',
        'ShowThemeExamples' => false,
        'ShowThemeSettings' => false,
        'MenuItems' => [
           'Users' => ['uri' => ['plugin' => false, 'controller' => 'Users', 'action' => 'index'], 'extras' => ['icon' => 'fa fa-user']],
           'Accounts' => [['uri' => '#', 'extras' => ['icon' => 'fa fa-database']],
              'All Accounts' => ['uri' => ['plugin' => false, 'controller' => 'Accounts', 'action' => 'index']],
              'Add Account' => ['uri' => ['plugin' => false, 'controller' => 'Accounts', 'action' => 'add']]
           ],
           'Bookings' => [['uri' => '#', 'extras' => ['icon' => 'fa fa-book']],
              'All Bookings' => ['uri' => ['plugin' => false, 'controller' => 'Bookings', 'action' => 'index']],
              'Expired Bookings' => ['uri' => ['plugin' => false, 'controller' => 'Bookings', 'action' => 'expired']]
           ],
           'Reservations' => ['uri' => ['plugin' => false, 'controller' => 'Reservations', 'action' => 'index'], 'extras' => ['icon' => 'fa fa-list-ol']]
        ]
      ]
  ]
];
return $config;
