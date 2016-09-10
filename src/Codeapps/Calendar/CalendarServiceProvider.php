<?php namespace Codeapps\Codeapps;

use Illuminate\Support\ServiceProvider;

class CodeappsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
        __DIR__.'/../../../public' => public_path('vendor/Codeapps'),
    ], 'public');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['rescalendar'] = $this->app->share(function($app)
		{
			return new Gantti;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('rescalendar');
	}

	}
