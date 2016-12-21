<?php

return [
    'database' => [
        'connection' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => 'smart',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    ]
];