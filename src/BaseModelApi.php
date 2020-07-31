<?php


namespace ag84ark\ObjectConvertor;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

abstract class BaseModelApi implements ArrayAccess, Arrayable, Jsonable, JsonSerializable
{

    public function toArray() : array  {
        return  ObjectConvertor::toArray($this);
    }


    public function toJson($options = 0) : string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize() : array
    {
        return $this->toArray();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        return ! is_null($this->$offset);
    }

    /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {

        return $this->$offset ?? null;
    }

    /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($offset, $value) : void
    {
        if (!is_null($offset) && $this->offsetExists($offset)) {
            $this->$offset = $value;
        }
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     */
    public function offsetUnset($offset) : void
    {
        unset($this->$offset);
    }
}
