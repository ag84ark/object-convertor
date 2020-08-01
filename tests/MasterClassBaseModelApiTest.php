<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\ObjectConvertor;
use ag84ark\ObjectConvertor\Tests\stubs\MasterClassBaseModelApi;

class MasterClassBaseModelApiTest extends TestCase
{
    /** @test */
    public function can_create_with_sub_class(): void
    {
        $array = [
            'var' => 'someVariable',
            'basicClassObject' => [
                'var1' => 'variable 1',
                'var2' => 'variable 2',
            ],
        ];

        $masterClass = ObjectConvertor::toObject($array, new MasterClassBaseModelApi());

        $this->assertEquals($masterClass->getBasicClassObject()->getVar1(), $array['basicClassObject']['var1']);
        $this->assertEquals($masterClass->getVar(), $array['var']);
    }

    /** @test */
    public function can_create_with_sub_class_from_array_function(): void
    {
        $array = [
            'var' => 'someVariable',
            'basicClassObject' => [
                'var1' => 'variable 1',
                'var2' => 'variable 2',
            ],
        ];

        $masterClass = MasterClassBaseModelApi::fromArray($array);

        $this->assertEquals($masterClass->getBasicClassObject()->getVar1(), $array['basicClassObject']['var1']);
        $this->assertEquals($masterClass->getVar(), $array['var']);
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

        $masterClass = MasterClassBaseModelApi::fromArray($array);

        $this->assertEquals($masterClass->toArray(false), $array);
        $this->assertEquals($masterClass->toArray()['basicClassObject'], $array['basicClassObject']);
    }
}
