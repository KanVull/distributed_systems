<?php

return
[
    'paths' => [
        'migrations' => './migrations',
        'seeds' => './seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'words',
        'words' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'words',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
