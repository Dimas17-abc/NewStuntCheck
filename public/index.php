<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

<<<<<<< HEAD

=======
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
