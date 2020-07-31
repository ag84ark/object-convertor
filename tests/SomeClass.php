<?php

namespace ag84ark\ObjectConvertor\Tests;

use ag84ark\ObjectConvertor\BaseModelApi;
use ag84ark\ObjectConvertor\ObjectConstructorTrait;

class SomeClass extends BaseModelApi
{
    use ObjectConstructorTrait;

    private $a;
    private $b;
    private $other = '';
    private $BigVar = '';
    private $camelVar = '';
    private $snake_var = '';

    public function getBigVar(): string
    {
        return $this->BigVar;
    }

    public function setBigVar(string $BigVar): void
    {
        $this->BigVar = $BigVar;
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param mixed $a
     */
    public function setA($a): void
    {
        $this->a = $a;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param mixed $b
     */
    public function setB($b): void
    {
        $this->b = $b;
    }

    public function getOther(): string
    {
        return $this->other;
    }

    public function setOther(string $other): void
    {
        $this->other = $other;
    }

    public function getCamelVar(): string
    {
        return $this->camelVar;
    }

    public function setCamelVar(string $camelVar): void
    {
        $this->camelVar = $camelVar;
    }

    public function getSnakeVar(): string
    {
        return $this->snake_var;
    }

    public function setSnakeVar(string $snake_var): void
    {
        $this->snake_var = $snake_var;
    }
}
