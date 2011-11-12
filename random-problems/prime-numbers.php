<?php

/**
 * Print prime numbers between 1 and 1000. Simple as that.
 *
 * @author     Pau Gay <pau.gay@gmail.com>
 */

function printPrimes($n)
{
    $found = 0;
    $i = 1;

    while ($found < $n)
    {
        if (isPrime($i))
        {
            echo "$i\n";
            $found++;
        }
        
        $i++;
    }
}

function isPrime($n)
{
    for ($i = 2; $i < $n-1; $i++)
    {
        if (($n % $i) == 0)
        {
            return FALSE;
        }
    }

    return TRUE;
}

printPrimes($argv[1]);

?>
