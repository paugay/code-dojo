<?php

/**
 * CommandLineParserTest.php
 *
 * Unit test for the command line parser.
 *
 * @version     $Id$
 * @package     KataArgs 
 * @author      Pau Gay <pau.gay@gmail.com> 
 */

// include the bootstrap
require_once '../../library/bootstrap.php';

// include CommandLineParser
require_once 'CommandLineParser.php';

class CommandLineParserTest
    extends PHPUnit_Framework_TestCase
{
    private $schema;
    private $value;
    private $arguments;

    public function setUp()
    {
        $this->schema = array(
            'arguments' => array(
                'l' => array(
                    'name' => 'logging',
                    'type' => 'boolean'
                ),
                'p' => array(
                    'name' => 'port',
                    'type' => 'integer'
                ),
                'd' => array(
                    'name' => 'directory',
                    'type' => 'string'
                )
            )
        );

        $this->arguments = '-l -p 8080 -d /asd/asd/asd';
        $this->arguments = explode(' ', $this->arguments);
    }

    public function buildObject()
    {
        $clp = new CommandLineParser($this->schema);
        return $clp;
    }

    public function testCanBuild()
    {
        $clp = $this->buildObject();

        $result = $clp->parse($this->arguments);

        $this->assertTrue($result['logging']);
        $this->assertEquals($result['port'], 8080);
        $this->assertEquals($result['directory'], '/asd/asd/asd');
    }

    public function testOkOnDifferentOrder()
    {
        $clp = $this->buildObject();

        $this->arguments = '-d /asd/asd/asd -l -p 8080';
        $this->arguments = explode(' ', $this->arguments);

        $result = $clp->parse($this->arguments);

        $this->assertTrue($result['logging']);
        $this->assertEquals($result['port'], 8080);
        $this->assertEquals($result['directory'], '/asd/asd/asd');
    }

    public function testOkOnNegativeArgument()
    {
        $clp = $this->buildObject();

        $this->arguments = '-p -8080 -d /asd/asd/asd';
        $this->arguments = explode(' ', $this->arguments);

        $result = $clp->parse($this->arguments);

        $this->assertEquals($result['port'], -8080);
    }

    public function testErrorOnUnknownArgument()
    {
        $this->setExpectedException('Exception');

        $clp = $this->buildObject();

        $this->arguments = '-q -p -8080 -d /asd/asd/asd';
        $this->arguments = explode(' ', $this->arguments);

        $result = $clp->parse($this->arguments);
    }

    public function testErrorOnUnknownArgumentType()
    {
        $this->setExpectedException('Exception');

        $this->schema['arguments']['p']['type'] = 'unknown';

        $clp = $this->buildObject();

        $result = $clp->parse($this->arguments);
    }
}
