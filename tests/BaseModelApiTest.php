<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\Tests\stubs\SomeClass;

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

    /** @test */
    public function can_be_constructed_from_class(): void
    {
        $newClass = new SomeClass($this->someClassObject);

        $this->assertEquals($this->someClassObject->getA(), $newClass->getA());
    }

    /** @test */
    public function can_be_constructed_from_string(): void
    {
        $newClass = new SomeClass($this->someClassObject->toJson());

        $this->assertEquals($this->someClassObject->getA(), $newClass->getA());
    }
}
