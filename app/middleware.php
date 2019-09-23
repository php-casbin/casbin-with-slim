<?php

declare(strict_types=1);

use App\Middleware\Authorization;
use Tuupola\Middleware\HttpBasicAuthentication;
use Slim\App;

return function (App $app) {
    $app->add(Authorization::class);

    $app->add(new HttpBasicAuthentication([
        'users' => [
            'root' => 't00r',
            'somebody' => 'passw0rd',
        ],
        'before' => function ($request, $arguments) {
            return $request->withAttribute('user', $arguments['user']);
        },
    ]));
};
