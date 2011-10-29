<?php

/**
 * functions.php
 *
 * This file contain some handy functions that we can use during our 
 * development.
 *
 * @version     $Id$
 * @package     library
 * @author      Pau Gay <pau.gay@gmail.com> 
 */

/**
 * Function that help with the dump of a variable.
 *
 * @param mixed $var The variable to dump.
 * @param boolean $die If we want to stop the execution after dump it 
 *     will be TRUE, FALSE otherwise.
 */
function dump ($var, $die = TRUE)
{
    echo '<pre>';
    var_dump($var);

    if ($die)
    {
        die;
    }
}

/**
 * Heading 1, add some style to the text that we want to output.
 *
 * @param string $str
 */
function h1 ($str)
{
    echo "\n\033[44;37;01m" . $str . "\033[0m\n\n";
}

/**
 * Error, show an error as a output.
 * 
 * @param string $str
 */
function error ($str)
{
    echo "\n\033[37;41mERROR: " . $str . "\033[0m\n\n";
}
