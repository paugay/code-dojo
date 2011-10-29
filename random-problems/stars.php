<?php

/**
 * Difficult to explain the problem. Much better to give a solution:
 *
 * if n = 3:
 *
 *     ***
 *     **
 *     *
 *
 * So this script basically prints this kind of picture for a given 
 * number of elements.
 *
 * @usage      php stars.php {n}
 *
 * @author     Pau Gay <pau.gay@gmail.com>
 */

function stars($n)
{
    if ($n != 0)
    {
        return printStars($n) . stars($n-1);
    }
}

function printStars($n)
{
    for ($i = 0; $i < $n; $i++)
    {
        echo "*";
    }

    echo "\n";
}

if ($argc == 1)
{
    echo "Usage: php stars.php N\n";
}

stars($argv[1]);

?>
