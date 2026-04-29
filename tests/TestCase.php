<?php

namespace ACBr\Laravel\Tests;

use ACBr\Laravel\ACBrServiceProvider;
use ACBr\Laravel\Facades\ACBr;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ACBrServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ACBr' => ACBr::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('acbrapi.token', 'test_token');
        config()->set('acbrapi.environment', 'sandbox');
    }
}
