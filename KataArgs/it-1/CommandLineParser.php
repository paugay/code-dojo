<?php

/**
 * CommandLineParser.php
 *
 * This class will provide the needed methods to parse a set of command 
 * line parameters.
 *
 * @version     $Id$
 * @package     KataArgs 
 * @author      Pau Gay <pau.gay@gmail.com> 
 */

// include the bootstrap
require_once '../../library/bootstrap.php';

class CommandLineParser
{
    /**
     * Schema of the parser.
     *
     * @var array
     */
    private $schema;

    /**
     * Store all the values that the command line parser is reading from 
     * the parameters and the schema.
     *
     * @var array
     */
    private $value;

    /**
     * Constructor. This function gets the schema and sets the default 
     * values into the $value array.
     *
     * @param array $schema The schema of the parser.
     */
    public function __construct ($schema)
    {
        $this->schema = $schema['arguments'];

        // assign the default arguments
        foreach ($this->schema as $defaultSchema)
        {
            if ($defaultSchema['hasDefaultValue'])
            {
                $this->value[$defaultSchema['name']] = 
                    $defaultSchema['default'];
            }
        }
    }

    /**
     * Parse. This function parse the parameters depending on the 
     * schema.
     *
     * @param array $parameters The parameters of the command line call.
     *
     * @return array The values that we have parsed.
     */
    public function parse ($parameters)
    {
        // while we have parameters to be seen
        while (count($parameters) > 0)
        {
            $argument = array_shift($parameters);

            // remove the '-' from the argument
            $argument = substr($argument, 1, strlen($argument));

            // check if we have a description for this argument
            if (array_key_exists($argument, $this->schema))
            {
                $config = $this->schema[$argument];

                /*
                 * Depending of the type of the argument, we will do one 
                 * thing or another.
                 */
                switch ($config['type'])
                {
                case 'boolean':
                    $this->value[$config['name']] = TRUE;
                    break;

                case 'integer':
                case 'string':
                    $value = array_shift($parameters);
                    $this->value[$config['name']] = $value;
                    break;

                default:
                    throw new Exception('Unknown argument type: "' . $argument. '"');
                    break;
                }
            }
            else
            {
                // this argument is not found on the schema
                throw new Exception('Unknown argument: "' . $argument. '"');
            }
        }

        return $this->value;
    }
}



