<?php
namespace JSiebach\Cheddar;
use Illuminate\Support\ServiceProvider;
use CheddarGetter_Client;
class CheddarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/cheddar.php' => config_path('cheddar.php'),
        ]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CheddarGetter_Client', function () {
            return new CheddarGetter_Client(
                $this->app['config']['cheddar']['url'],
                $this->app['config']['cheddar']['username'],
                $this->app['config']['cheddar']['password']
            );
        });
    }
}