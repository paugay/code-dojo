<?php

$db = new DateTime('2009-12-31');
$de = new DateTime('2010-12-31');

$next = 'third tuesday of next month';
$di = DateInterval::createFromDateString($next);

$dp = new DatePeriod($db, $di, $de, DatePeriod::EXCLUDE_START_DATE);

foreach($dp as $dt) 
{
    echo $dt->format("F jS\n") . "\n";
}

?>
