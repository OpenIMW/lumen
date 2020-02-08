<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
	dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
	dirname(__DIR__)
);


$app->singleton(
	Illuminate\Contracts\Debug\ExceptionHandler::class,
	App\Exceptions\Handler::class
);

$app->singleton(
	Illuminate\Contracts\Console\Kernel::class,
	App\Console\Kernel::class
);

$configure = require 'configure.php';

if ($configure['config']) {
	$app->configure('app');
}


if ($configure['facades']) {
	$app->withFacades();
}


if ($configure['eloquent']) {
	$app->withEloquent();
}


if (empty($configure['middlewares']) === false) {
	$app->middleware($configure['middlewares']);
}

if (empty($configure['routeMiddlewares']) === false) {
	$app->routeMiddleware($configure['routeMiddlewares']);
}

if (empty($configure['providers']) === false) {
	foreach ($configure['providers'] as $provider) {
		$app->register($provider);
	}
}

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
	'namespace' => 'App\Http\Controllers',
], function ($router) {
	require __DIR__.'/../routes/web.php';
});

return $app;
