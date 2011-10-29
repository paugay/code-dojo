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

// if no parameters, display the help messag
if (count($parameters) == 1)
{
    error('No parameters has been found');

    h1('Usage');
    echo "php run.php [SCHEMA] [PARAMETERS]\n\n";

    h1('Sample');
    echo "php run.php clp-schema-1.yml -l -p 8080 -d /asd/asd/asd\n\n";

    die;
}

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
    error((string) $e);
    die;
}

h1('Success');
echo "Displaying the array with the parsed parameters\n\n";
var_dump($result);

?>
