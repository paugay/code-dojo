<?php

trait Singleton 
{
    public static function getInstance() 
    { 
        echo "asd\n"; 
    }
}

class A 
{
    use Singleton;
}

class B
{
    use Singleton;
}

// Singleton method is now available for both classes
A::getInstance();
B::getInstance();

?>
