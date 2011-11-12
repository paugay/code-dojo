<?php

/**
 * This is a binary search implementation (where complexity is better 
 * than the linear search).
 *
 * Basically, given a ordered array of integers it will return TRUE if 
 * the element is into the array and FALSE otherwise.
 *
 * @author     Pau Gay <pau.gay@gmail.com>
 */

function search($array, $element)
{
    return bsearch($array, $element, 0, count($array), 1);
}

function bsearch($array, $element, $first, $last, $n)
{
    $mid = $first + ceil(($last - $first) / 2);
    echo "$n [ $first - $last ] mid = $mid\n";

    if (($last - $first) <= 2)
    {
        return ($array[$last] == $element) || ($array[$first] == $element);
    }

    if ($array[$mid] == $element)
    {
        return TRUE;
    }
    else if ($element < $array[$mid])
    {
        return bsearch($array, $element, $first, $mid - 1, $n + 1);
    }
    else if ($array[$mid] < $element)
    {
        return bsearch($array, $element, $mid + 1, $last, $n + 1);
    }
}

$a = range(1, 5000);

var_dump(search ($a, 5001));
