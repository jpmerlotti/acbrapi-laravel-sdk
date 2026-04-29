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

            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'acbrapi-migrations');
        }

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'acbrapi');

        // Register Livewire Components
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('acbr-cep-lookup', \ACBr\Laravel\Livewire\CepLookup::class);
            \Livewire\Livewire::component('acbr-nfe-list', \ACBr\Laravel\Livewire\NfeList::class);
        }
    }
}
