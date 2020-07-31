<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\ObjectConvertorServiceProvider;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ObjectConvertorServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
