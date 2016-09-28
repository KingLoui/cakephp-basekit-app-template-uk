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
           'Users' => ['uri' => ['controller' => 'Users', 'action' => 'index'], 'extras' => ['icon' => 'fa fa-user']],
           'Accounts' => [['uri' => '#', 'extras' => ['icon' => 'fa fa-database']],
              'All Accounts' => ['uri' => ['controller' => 'Accounts', 'action' => 'index']],
              'Add Account' => ['uri' => ['controller' => 'Accounts', 'action' => 'add']]
           ],
           'Bookings' => [['uri' => '#', 'extras' => ['icon' => 'fa fa-book']],
              'All Bookings' => ['uri' => ['controller' => 'Bookings', 'action' => 'index']],
              'Expired Bookings' => ['uri' => ['controller' => 'Bookings', 'action' => 'expired']]
           ],
           'Reservations' => ['uri' => ['controller' => 'Reservations', 'action' => 'index'], 'extras' => ['icon' => 'fa fa-list-ol']]
        ]
      ]
  ]
];
return $config;
