# Object Convertor (works with Laravel)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ag84ark/object-convertor.svg?style=flat-square)](https://packagist.org/packages/ag84ark/object-convertor)
[![Build Status](https://img.shields.io/travis/ag84ark/object-convertor/master.svg?style=flat-square)](https://travis-ci.org/ag84ark/object-convertor)
[![Quality Score](https://img.shields.io/scrutinizer/g/ag84ark/object-convertor.svg?style=flat-square)](https://scrutinizer-ci.com/g/ag84ark/object-convertor)
[![Total Downloads](https://img.shields.io/packagist/dt/ag84ark/object-convertor.svg?style=flat-square)](https://packagist.org/packages/ag84ark/object-convertor)

This package helps too easily transform an array to a predefined class with setters and getters

---
For understanding better the use of this package please look at the `Usage` 
as well as in the `tests` folder where you can understand better how to use this class.

I created this package as it helps me a lot when I am working with JSON information in the DataBase that 
is structured into classes and subclasses.

Really hope that would be of some help to others as well!
  
---
## Installation

You can install the package via composer:

```bash
composer require ag84ark/object-convertor
```

## Usage

When creating classes for Laravel applications try to extend the `BaseModelApi` as helps you with a lot of things.

#### Sample class
``` php
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

    // ....
}
```

#### Via constructor  ( needs ObjectConstructorTrait )
```php
$array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

$someClassObject = new SomeClass($array);
```


#### From array ( needs ObjectConstructorTrait )
```php
$array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

$someClassObject = SomeClass::fromArray($array);
```

#### Via ObjectConvertor to class that extends BaseModelApi 
```php
$array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

/** @var SomeClass $someClassObject */
$someClassObject = ObjectConvertor::toObjectBaseModelApi($array, new SomeClass());
```


#### Via ObjectConvertor to normal class
```php
$array = ['a' => 'val_a', 'b' => 'val_b', 'other' => 'val_other'];

/** @var SomeClass $someClassObject */
$someClassObject = ObjectConvertor::toObject($array, new SomeClass());
```



# Basic class example
```php

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


$array = ['var1' => 'val_a', 'var2' => 'val_b'];

/** @var BasicClass $basicClassObject */
$basicClassObject = ObjectConvertor::toObject($array, new BasicClass());
```



### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email arkangel062003@gmail.com instead of using the issue tracker.

## Credits

- [George Cojocaru](https://github.com/ag84ark)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
