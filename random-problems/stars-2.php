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
        for ($i = 0; $i < $n; $i++)
        {
            echo "*";
        }

        echo "\n";

        return stars($n-1);
    }
}

if ($argc == 1)
{
    echo "Usage: php stars.php N\n";
}

stars($argv[1]);

?>
