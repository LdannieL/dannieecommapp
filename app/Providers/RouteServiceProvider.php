<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use \Route, \Session, \Input, \Auth, \Redirect;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		Route::filter('admin', function()
		{
			if (!Auth::user() || Auth::user()->admin != 1) return Redirect::to('/');
		});

		Route::filter('csrf', function()
		{
			if (Session::token() != Input::get('_token'))
			{
				throw new Illuminate\Session\TokenMismatchException;
			}
		});

		Route::filter('auth', function()
		{
			if (Auth::guest()) return Redirect::guest('users/signin');
		});

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
