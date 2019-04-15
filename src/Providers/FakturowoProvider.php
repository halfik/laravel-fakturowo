<?php

namespace Halfik\Fakturowo\Providers;

use Halfik\Fakturowo\Fakturowo;
use \Illuminate\Support\ServiceProvider;

/**
 * Class FakturowoProvider
 * @package Halfik\Fakturowo
 */
class FakturowoProvider extends ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../../config/fakturowo.php';


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(self::CONFIG_PATH, 'fakturowo');
        $this->app->singleton('fakturowo.pl', function ($app) {
            return new Fakturowo();
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([self::CONFIG_PATH => config_path('fakturowo.php')], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Fakturowo::class
        ];
    }
}
