<?php

return [
    'Users.SimpleRbac.permissions' => [
        [
            'role' => 'admin',
            'plugin' => '*',
            'prefix' => '*',
            'controller' => '*',
            'action' => '*',
        ],
        [
            'role' => 'user',
            'plugin' => '*',
            'prefix' => 'admin',
            'controller' => 'Pages',
            'action' => '*',
        ]
    ]
];