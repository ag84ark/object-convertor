<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\ObjectConvertorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [ObjectConvertorServiceProvider::class];
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('logging.default', 'errorlog');
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
           'driver' => 'sqlite',
           'database' => ':memory:',
           'prefix' => '',
        ]);

        //include_once __DIR__.'/../database/migrations/create_wrong_emails_table.php.stub';
        //(new \CreateWrongEmailsTable())->up();
    }

    protected function setUp(): void
    {
        parent::setUp();

        //$this->withFactories(__DIR__.'/../database/factories');
    }
}
