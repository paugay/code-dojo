<?php

$iterator = new GlobIterator('/var/log/*.log');

foreach($iterator as $file) 
{
    echo $file->getFilename() . "\n";
}

?>
