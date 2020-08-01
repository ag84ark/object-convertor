<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\Tests\stubs\MasterClassBaseModelApi;
use ag84ark\ObjectConvertor\Tests\stubs\SomeClass;

class ObjectConstructorTraitTest extends TestCase
{
    /** @test */
    public function convert_array_to_object_via_constructor(): void
    {
        $array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other', 'big_var' => 'someBigVar'];

        $someClassObject = new SomeClass($array);

        $this->assertEquals($someClassObject->getA(), $array['a']);
        $this->assertEquals($someClassObject->getB(), $array['b']);
        $this->assertEquals($someClassObject->getOther(), $array['other']);
    }

    /** @test */
    public function convert_snake_case_attribute_6(): void
    {
        $array = ['snakeVar' => 'aaa'];

        $someClassObject = new SomeClass($array);

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getSnakeVar(), $array['snakeVar']);
    }

    /** @test */
    public function convert_snake_case_attribute_7(): void
    {
        $array = ['snake_var' => 'aaa'];

        $someClassObject = new SomeClass($array);

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getSnakeVar(), $array['snake_var']);
    }

    /** @test */
    public function convert_snake_case_attribute_8(): void
    {
        $array = ['bigVar' => 'aaa'];

        $someClassObject = new SomeClass($array);

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getBigVar(), $array['bigVar']);
    }

    /** @test */
    public function can_exports_sub_class_on_to_array(): void
    {
        $array = [
            'var' => 'someVariable',
            'basicClassObject' => [
                'var1' => 'variable 1',
                'var2' => 'variable 2',
            ],
            'someClassObject' => [
                'other' => 'fooBaz',
            ],
        ];

        $masterClass = new MasterClassBaseModelApi($array);
        dump($masterClass);

        $this->assertEquals($masterClass->toArray()['basicClassObject'], $array['basicClassObject']);
    }
}
