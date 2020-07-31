<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\ObjectConvertor;

class BaseTest extends TestCase
{
    /** @test */
    public function convert_array_to_object_via_constructor(): void
    {
        $array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

        $someClassObject = new SomeClass($array);

        $this->assertEquals($someClassObject->getA(), $array['a']);
        $this->assertEquals($someClassObject->getB(), $array['b']);
        $this->assertEquals($someClassObject->getOther(), $array['other']);
    }

    /** @test */
    public function convert_array_to_object_fromArray(): void
    {
        $array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

        $someClassObject = SomeClass::fromArray($array);

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getA(), $array['a']);
        $this->assertEquals($someClassObject->getB(), $array['b']);
        $this->assertEquals($someClassObject->getOther(), $array['other']);
    }

    /** @test */
    public function convert_via_object_convertor_base_model_api(): void
    {
        $array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

        /** @var SomeClass $someClassObject */
        $someClassObject = ObjectConvertor::toObjectBaseModelApi($array, new SomeClass());

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getA(), $array['a']);
        $this->assertEquals($someClassObject->getB(), $array['b']);
        $this->assertEquals($someClassObject->getOther(), $array['other']);
    }

    /** @test */
    public function convert_via_object_convertor(): void
    {
        $array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

        /** @var SomeClass $someClassObject */
        $someClassObject = ObjectConvertor::toObject($array, new SomeClass());

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getA(), $array['a']);
        $this->assertEquals($someClassObject->getB(), $array['b']);
        $this->assertEquals($someClassObject->getOther(), $array['other']);
    }

    /** @test */
    public function convert_via_object_convertor_base_class(): void
    {
        $array = ['var1' => 'val_a', 'var2' => 'val_b'];

        /** @var BasicClass $basicClassObject */
        $basicClassObject = ObjectConvertor::toObject($array, new BasicClass());

        $this->assertEquals(BasicClass::class, get_class($basicClassObject));
        $this->assertEquals($basicClassObject->getVar1(), $array['var1']);
        $this->assertEquals($basicClassObject->getVar2(), $array['var2']);
    }

    /** @test */
    public function convert_capital_letter_attribute(): void
    {
        $array = ['BigVar' => 'aaa'];

        /** @var SomeClass $someClassObject */
        $someClassObject = ObjectConvertor::toObject($array, new SomeClass());

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getBigVar(), $array['BigVar']);
    }

    /** @test */
    public function convert_capital_letter_attribute_2(): void
    {
        $array = ['bigVar' => 'aaa'];

        /** @var SomeClass $someClassObject */
        $someClassObject = ObjectConvertor::toObject($array, new SomeClass());

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getBigVar(), $array['bigVar']);
    }

    /** @test */
    public function convert_snake_case_attribute_3(): void
    {
        $array = ['snake_var' => 'aaa'];

        /** @var SomeClass $someClassObject */
        $someClassObject = ObjectConvertor::toObject($array, new SomeClass());

        $this->assertEquals(SomeClass::class, get_class($someClassObject));
        $this->assertEquals($someClassObject->getSnakeVar(), $array['snake_var']);
    }
}
