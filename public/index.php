<?php

require __DIR__.'/../vendor/autoload.php';

define('ROOT_PATH', dirname(__DIR__));

$app = require_once ROOT_PATH . '/app/app.php';

$app->run();
