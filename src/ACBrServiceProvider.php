<?php

namespace ACBr\Laravel;

use Illuminate\Support\ServiceProvider;

class ACBrServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/acbrapi.php', 'acbrapi');

        $this->app->singleton('acbr', function ($app) {
            return new ACBrManager($app['config']->get('acbrapi'));
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/acbrapi.php' => config_path('acbrapi.php'),
            ], 'acbrapi-config');
        }
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'acbrapi');
    }
}
