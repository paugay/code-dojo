<?php

function towers($size, $from = 'f', $to = 't', $spare = 's')
{
    if ($size == 1)
    {
        echo "Move from $from to $to\n";
    }
    else
    {
        towers($size - 1, $from, $spare, $to);
        towers(1, $from, $to, $spare);
        towers($size - 1, $spare, $to, $from);
    }
}

towers($argv[1]);
