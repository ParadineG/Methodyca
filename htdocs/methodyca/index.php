<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

if ($_SERVER['REQUEST_URI'] !== '/' && $_SERVER['REQUEST_URI'] !== '' 
    && $_SERVER['REQUEST_URI'] !== '/methodyca' 
    && $_SERVER['REQUEST_URI'] !== '/methodyca'.'/'
    && !strpos($_SERVER['REQUEST_URI'], 'database') 
    && !strpos($_SERVER['REQUEST_URI'], 'admin') 
    && !strpos($_SERVER['REQUEST_URI'], 'login') 
    && !strpos($_SERVER['REQUEST_URI'], 'register') 
    && !strpos($_SERVER['REQUEST_URI'], 'forgot-password') 
    && !strpos($_SERVER['REQUEST_URI'], 'reset-password') 
    && !strpos($_SERVER['REQUEST_URI'], 'dashboard')
    && !strpos($_SERVER['REQUEST_URI'], 'edit-topic')
    && !strpos($_SERVER['REQUEST_URI'], 'profile')) {   
    header("Cross-Origin-Embedder-Policy: require-corp");
    header("Cross-Origin-Opener-Policy: same-origin");
}
define('LARAVEL_START', microtime(true));
/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../../Methodyca/storage/framework/maintenance.php')) {
    require __DIR__.'/../../Methodyca/storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../../Methodyca/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../../Methodyca/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
