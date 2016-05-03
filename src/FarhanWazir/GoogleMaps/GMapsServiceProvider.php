<?php namespace FarhanWazir\GoogleMaps;

use Illuminate\Support\ServiceProvider;

class GMapsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GMaps', function ($app) {
            return new GMaps();
        });
        /*$this->app['phpgmaps'] = $this->app->share(function ($app) {
            return new Phpgmaps();
        });*/
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('GMaps');
    }
}
