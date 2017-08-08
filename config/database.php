<?php

return [


    'default' => 'pgsql',
    'connections' => [

        'pgsql' => [
          'driver'   => 'pgsql',
          'host'     => parse_url(getenv("DATABASE_URL"))["host"],
          'database' => substr(parse_url(getenv("DATABASE_URL"))["path"], 1),
          'username' => parse_url(getenv("DATABASE_URL"))["user"],
          'password' => parse_url(getenv("DATABASE_URL"))["pass"],
          'charset'  => 'utf8',
          'prefix'   => '',
          'schema'   => 'public',
                                ],
    ],


    'migrations' => 'migrations',

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
