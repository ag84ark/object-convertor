<?php

namespace ag84ark\ObjectConvertor\Tests;

class BasicClass
{
    private $var1;
    private $var2;

    /**
     * @return mixed
     */
    public function getVar1()
    {
        return $this->var1;
    }

    /**
     * @param mixed $var1
     */
    public function setVar1($var1): void
    {
        $this->var1 = $var1;
    }

    /**
     * @return mixed
     */
    public function getVar2()
    {
        return $this->var2;
    }

    /**
     * @param mixed $var2
     */
    public function setVar2($var2): void
    {
        $this->var2 = $var2;
    }
}
