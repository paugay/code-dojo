<?php

class Container
{
    protected $values = array();

    public function _set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function _get($key)
    {
        if (!isset($this->values[$key]))
        {
            throw new InvalidArgumentException(
                sprintf(
                    'Value %s is not defined', 
                    $id
                )
            );
        }

        if (is_callable($this->values[$key]))
        {
            return $this->values[$key]($this);
        }
        else
        {
            return $this->values[$key];
        }
    }

    public function asShared(Closure $lambda)
    {
        return function ($container) use ($lambda)
        {
            static $object;

            if (is_null($object))
            {
                $object = $lambda($container);
            }

            return $object;
        };
    }
}
