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
    $primes = array();

    while ($found < $n)
    {
        $isPrime = TRUE;
        $j = 1;

        if (count($primes) > 2)
        {
            while (isset($primes[$j]) && $primes[$j] < $i)
            {
                if (($i % $primes[$j]) == 0)
                {
                    $isPrime = FALSE;
                }

                $j++;
            }
        }

        if ($isPrime)
        {
            echo "$i\n";
            $primes[] = $i;
            $found++;
        }

        $i++;
    }
}

printPrimes($argv[1]);

?>
