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
        $isPrime = TRUE;

        for ($j = 2; $j < $i-1; $j++)
        {
            if (($i % $j) == 0)
            {
                $isPrime = FALSE;
            }
        }

        if ($isPrime)
        {
            echo "$i\n";
            $found++;
        }
        
        $i++;
    }
}

printPrimes($argv[1]);

?>
