<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';


$app->handleRequest(Request::capture());


//fakecmpsr  install --no-dev --optimize-autoloader| install --no-dev
/** php artisan optimize:clear , php artisan config:cache , php artisan route:cache , php artisan view:cache **/
