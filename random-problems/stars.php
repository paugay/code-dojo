<?php

stars(4);

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
