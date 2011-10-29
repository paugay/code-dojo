<?php

class User
{
    protected $storage;

    function _construct($storage)
    {
        $this->storage = $storage;
    }
}
