<?php

class CounterFactory
{
    public function makeCounter()
    {
        $count = 0;

        return function() use (&$count) 
        {
            $count++;
            return $count;
        };
    }
}

$counterFactory = new CounterFactory();

$c1 = $counterFactory->makeCounter();

var_dump($c1());
var_dump($c1());

$c2 = $counterFactory->makeCounter();

var_dump($c2());
var_dump($c2());
var_dump($c2());
var_dump($c2());

var_dump($c1());
var_dump($c1());
var_dump($c1());
var_dump($c1());

?>

