<?php

namespace ag84ark\ObjectConvertor;


use Illuminate\Support\Str;

class ObjectConvertor
{
    public static function toObject(array $array, $object)
    {
        $class = get_class($object);

        $methods = get_class_methods($class);

        foreach ($methods as $method) {

            preg_match('/^(set)(.*?)$/i', $method, $results);

            $pre = $results[1] ?? '';

            $k = $results[2] ?? '';

            $k = strtolower(substr($k, 0, 1)) . substr($k, 1);
            $k2 = Str::snake($k);

            if ($pre === 'set' && !empty($array[$k])) {
                $object->$method($array[$k]);
            } elseif ($pre === 'set' && !empty($array[$k2])) {
                $object->$method($array[$k2]);
            } elseif ($pre === 'set' && !empty($array[Str::ucfirst($k)])) {
                $object->$method($array[Str::ucfirst($k)]);
            }
        }
        return $object;
    }

    /**
     * @param array $array
     * @param $object
     * @return BaseModelApi
     */
    public static function toObjectBaseModelApi(array $array, $object): BaseModelApi
    {
        $class = get_class($object);

        $methods = get_class_methods($class);

        foreach ($methods as $method) {

            preg_match('/^(set)(.*?)$/i', $method, $results);

            $pre = $results[1] ?? '';

            $k = $results[2] ?? '';

            $k = strtolower($k[0]) . substr($k, 1);

            $k2 = Str::snake($k);

            if ($pre === 'set' && !empty($array[$k])) {

                $object->$method($array[$k]);
            } elseif ($pre === 'set' && !empty($array[$k2])) {

                $object->$method($array[$k2]);
            } elseif ($pre === 'set' && !empty($array[Str::ucfirst($k)])) {
                $object->$method($array[Str::ucfirst($k)]);
            }
        }
        return $object;
    }

    public static function toArray($object): array
    {
        $array = array();

        $class = get_class($object);

        $methods = get_class_methods($class);

        foreach ($methods as $method) {

            preg_match('/^(get)(.*?)$/i', $method, $results);

            $pre = $results[1] ?? '';

            $k = $results[2] ?? '';

            $k = strtolower(substr($k, 0, 1)) . substr($k, 1);

            if ($pre === 'get') {

                $array[$k] = $object->$method();
                if (is_object($array[$k])) {
                    if (method_exists($array[$k], 'toArray'))
                        $array[$k] = $array[$k]->toArray();
                    else
                        $array[$k] = self::toArray($array[$k]);
                }
                if (is_array($array[$k])) {
                    foreach ($array[$k] as $key => $value) {
                        if (is_object($array[$k][$key])) {
                            if (method_exists($array[$k][$key], 'toArray')) {
                                $array[$k][$key] = $array[$k][$key]->toArray();
                            } else {
                                $array[$k][$key] = self::toArray($array[$k][$key]);
                            }
                        }
                    }
                }
            }
        }
        return $array;
    }
}
