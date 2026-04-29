<?php

namespace ACBr\Laravel\Tests;

use ACBr\Laravel\ACBrServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ACBrServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('acbrapi.client_id', 'test_id');
        config()->set('acbrapi.client_secret', 'test_secret');
        config()->set('acbrapi.environment', 'sandbox');

        $app['config']->set('database.default', 'testing');
    }
}
