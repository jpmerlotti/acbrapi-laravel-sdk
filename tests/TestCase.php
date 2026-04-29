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
        config()->set('acbrapi.token', 'test_token');
        config()->set('acbrapi.environment', 'sandbox');
    }
}
