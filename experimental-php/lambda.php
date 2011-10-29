<?php

$foo = function() { return "foo"; };

function bar()
{
    return "bar";
}

function foo()
{
    return "foo-2";
}

var_dump($foo());
var_dump(bar());

$variable = 'bar';

var_dump($variable());

$variable = 'foo';

var_dump($variable());
var_dump($$variable());
