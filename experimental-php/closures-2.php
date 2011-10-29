<?php

$hello = function ($name) { echo "Hello $name\n"; };

$hello("Pau");

$t1 = microtime();
call_user_func($hello, "Pau");
$t2 = microtime();
var_dump(($t2-$t1)*10000);

function foo(Closure $func, $name)
{
    $func($name);
}

$t1 = microtime();
foo($hello, "Pau");
$t2 = microtime();
var_dump(($t2-$t1)*10000);
