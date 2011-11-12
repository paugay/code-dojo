<?php

$data = array(3, 2, 8, 5, 6, 1, 7, 4, 9);

usort(
    $data, 
    function ($a,$b) 
    {
        if ($a % 2 == $b % 2) return $a > $b;
        return ($a % 2) ? 1 : -1;
    }
);

foreach($data as $v) echo "$v ";
