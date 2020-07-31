<?php

namespace ag84ark\ObjectConvertor\Tests;

class BaseModelApiTest extends TestCase
{
    /** @var SomeClass */
    private $someClassObject;
    private $array;

    protected function setUp(): void
    {
        parent::setUp();
        $this->array = ['a' => 'val_a',
                  'b' => 'val_b',
                  'other' => 'val_other',
                  'snakeVar' => 'bar',
                  'bigVar' => 'foo',
                  'camelVar' => 'Baz',
        ];
        $this->someClassObject = new SomeClass($this->array);
    }

    /** @test */
    public function to_array(): void
    {
        $this->assertEquals($this->someClassObject->toArray(), $this->array);
    }

    /** @test */
    public function to_json(): void
    {
        $jsonString = $this->someClassObject->toJson();
        $this->assertEquals(json_decode($jsonString, true), $this->array);
    }

    /** @test */
    public function add_new_variable(): void
    {
        $this->someClassObject->newVar = '123';

        $this->assertEquals($this->someClassObject->newVar, '123');
    }
}
