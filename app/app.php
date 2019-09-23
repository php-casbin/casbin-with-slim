<?php

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Set up settings
$settings = require ROOT_PATH.'/app/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require ROOT_PATH.'/app/dependencies.php';
$dependencies($containerBuilder);

// Set up repositories
$repositories = require ROOT_PATH.'/app/repositories.php';
$repositories($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
$app = AppFactory::createFromContainer($container);

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Register middleware
$middleware = require ROOT_PATH.'/app/middleware.php';
$middleware($app);

// Register routes
$routes = require ROOT_PATH.'/app/routes.php';
$routes($app);

return $app;