<?php

/**
 * App config
 */
return
[
	# Enable facades
	'facades' => false,

	# Enable eloquent
	'eloquent' => false,

	# Enable configuration
	'config' => true,

	# Global middlewares
	'middlewares' =>
	[
		 // App\Http\Middleware\ExampleMiddleware::class
	],

	# Route middlewares
	'routeMiddlewares' =>
	[
		// 'auth' => App\Http\Middleware\Authenticate::class,
	],

	# App service providers
	'providers' =>
	[
		// App\Providers\AppServiceProvider::class,
		// App\Providers\AuthServiceProvider::class,
		// App\Providers\EventServiceProvider::class
	]
];
