<?php

namespace ag84ark\ObjectConvertor;

use Illuminate\Support\Str;

trait ObjectConstructorTrait
{
    /**
     * ObjectConstructorTrait constructor.
     *
     * @param array|string|object $array
     */
    public function __construct($array = [])
    {
        if (is_string($array)) {
            $array = json_decode($array, true);
        }
        if (is_object($array)) {
            $array = (array) $array;
        }

        $methods = get_class_methods(self::class);

        foreach ($methods as $method) {
            preg_match('/^(set)(.*?)$/i', $method, $results);

            $pre = $results[1] ?? '';

            $k = $results[2] ?? '';

            $k = strtolower(substr($k, 0, 1)).substr($k, 1);
            $k2 = Str::snake($k);

            if ('set' === $pre && ! empty($array[$k])) {
                $this->$method($array[$k]);
            } elseif ('set' === $pre && ! empty($array[$k2])) {
                $this->$method($array[$k2]);
            } elseif ('set' === $pre && ! empty($array[Str::ucfirst($k)])) {
                $this->$method($array[Str::ucfirst($k)]);
            }
        }

        return $this;
    }

    /**
     * @return self|BaseModelApi
     */
    public static function fromArray(array $arrayData)
    {
        return ObjectConvertor::toObjectBaseModelApi($arrayData, new self());
    }
}
