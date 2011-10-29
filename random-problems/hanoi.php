<?php

/**
 * This script return the movements needed to resolve the "hanoi towers" 
 * problem.
 *
 * Usage: php hanoi.php {n}
 *
 *     - Where N is the number of elements that we have on the initial tower.
 *
 * The initial setting of the towers is the following:
 *
 *     - Tower 1: Destination
 *     - Tower 2: Initial set of elements 
 *     - Tower 3: Spare tower
 *
 * @author     Pau Gay <pau.gay@gmail.com>
 */

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

if ($argc == 1)
{
    echo "Usage: php hanoi.php N\n";
}

towers($argv[1]);

?>
