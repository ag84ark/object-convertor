<?php

namespace ag84ark\ObjectConvertor;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ag84ark\ObjectConvertor\Skeleton\SkeletonClass
 */
class ObjectConvertorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'object-convertor';
    }
}
