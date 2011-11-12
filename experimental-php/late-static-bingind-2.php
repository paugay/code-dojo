<?php

abstract class Singleton 
{
    private static $instances = array();

    final public static function getInstance() 
    {
        $className = get_called_class();

        if (!isset(self::$instances[$className])) 
        {
            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }
}

class foo extends Singleton {}
class bar extends Singleton {}

$a = foo::getInstance();
$b = foo::getInstance();
$c = bar::getInstance();

echo '<pre>';
var_dump($a);
var_dump($b);
var_dump($c);
echo '</pre>';
?>
