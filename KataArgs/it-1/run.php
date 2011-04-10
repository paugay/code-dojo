<?php

/**
 * run.php
 *
 * This script will filter the input parameters and execute the code of 
 * the kata.
 *
 * @version     $Id$
 * @package     KataArgs 
 * @author      Pau Gay <pau.gay@gmail.com> 
 */

// include the command line parser class
require_once "CommandLineParser.php";

$parameters = $argv;

// grab the clp schema
$schemaYaml = $parameters[1];

$yaml = new sfYamlParser();

// parse the YAML file
$schema = $yaml->parse(file_get_contents($schemaYaml));

// remove the script name from the input array
array_shift($parameters);

// remove the schema from the input array
array_shift($parameters);

$clp = new CommandLineParser($schema);

try
{
    $result = $clp->parse($parameters);
}
catch (Exception $e)
{
    error( (string) $e );
    exit(1);
}

var_dump($result);
die;

?>
