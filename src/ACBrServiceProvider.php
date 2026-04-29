<?php

namespace ACBr\Laravel;

use Illuminate\Support\ServiceProvider;

class ACBrServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/acbrapi.php', 'acbrapi'
        );

        $this->app->singleton('acbr', function ($app) {
            return new ACBrManager($app['config']['acbrapi']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/acbrapi.php' => config_path('acbrapi.php'),
            ], 'acbrapi-config');

            // Aqui futuramente registraremos os comandos de instalação e views
        }
    }
}
