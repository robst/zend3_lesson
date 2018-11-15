<?php

return [
    'driver'         => 'Pdo',
    'username'       => 'root',  //edit this
    'password'       => 'rob',  //edit this
    'dsn'            => 'mysql:dbname=cash_journal;host=localhost',
    'driver_options' => [
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
    ]
];
