
<?php

require dirname(dirname(__DIR__)) . "/public/index.php";

return
[
    'paths' => [
        'migrations' => dirname(dirname(__DIR__)) .  '/db/migrations',
        'seeds' => dirname(dirname(__DIR__)) .  '/db/seeds'
    ],
    'environments' => [
        'default_database' => 'development',
        'development' => [
            'name' => 'lopango',
            'connection' => \Framework\Container::getPDO()
            
        ]
    ]
];
