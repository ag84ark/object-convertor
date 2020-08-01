<?php

namespace ag84ark\ObjectConvertor\Tests\stubs;

use ag84ark\ObjectConvertor\BaseModelApi;
use ag84ark\ObjectConvertor\ObjectConstructorTrait;
use ag84ark\ObjectConvertor\ObjectConvertor;

class MasterClassBaseModelApi extends BaseModelApi
{
    use ObjectConstructorTrait;

    /** @var BasicClass */
    private $basicClassObject;

    /** @var SomeClass */
    private $someClassObject;

    private $Var = '';

    public function getBasicClassObject(): ?BasicClass
    {
        return $this->basicClassObject;
    }

    /**
     * @param BasicClass|array $basicClassObject
     */
    public function setBasicClassObject($basicClassObject): void
    {
        if (is_array($basicClassObject)) {
            $this->basicClassObject = ObjectConvertor::toObject($basicClassObject, new BasicClass());
        } elseif ($basicClassObject instanceof BasicClass) {
            $this->basicClassObject = $basicClassObject;
        }
    }

    public function getVar(): string
    {
        return $this->Var;
    }

    public function setVar(string $var): void
    {
        $this->Var = $var;
    }

    /**
     * @param SomeClass|array $someClassObject
     */
    public function setSomeClassObject($someClassObject): void
    {
        if (is_array($someClassObject)) {
            $this->someClassObject = ObjectConvertor::toObjectBaseModelApi($someClassObject, new SomeClass());
        } elseif ($someClassObject instanceof SomeClass) {
            $this->someClassObject = $someClassObject;
        }
    }

    /**
     * @return SomeClass
     */
    public function getSomeClassObject(): ?SomeClass
    {
        return $this->someClassObject;
    }
}
