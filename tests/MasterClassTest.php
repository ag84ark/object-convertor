<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\ObjectConvertor;
use ag84ark\ObjectConvertor\Tests\stubs\MasterClass;

class MasterClassTest extends TestCase
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

        $masterClass = ObjectConvertor::toObject($array, new MasterClass());

        $this->assertEquals($masterClass->getBasicClassObject()->getVar1(), $array['basicClassObject']['var1']);
        $this->assertEquals($masterClass->getVar(), $array['var']);
    }
}
