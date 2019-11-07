<?php

namespace bitspro\StripeMarketplace;

use Illuminate\Support\ServiceProvider;

class StripeMarketplaceServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'bitspro');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'bitspro');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/stripemarketplace.php', 'stripemarketplace');

        // Register the service the package provides.
        $this->app->singleton('stripemarketplace', function ($app) {
            return new StripeMarketplace;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['stripemarketplace'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/stripemarketplace.php' => config_path('stripemarketplace.php'),
        ], 'stripemarketplace.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/bitspro'),
        ], 'stripemarketplace.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/bitspro'),
        ], 'stripemarketplace.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/bitspro'),
        ], 'stripemarketplace.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
