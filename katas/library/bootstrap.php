<?php

/**
 * bootstrap.php
 *
 * This file will load all the external libraries that we will use.
 *
 * @version     $Id$
 * @package     library
 * @author      Pau Gay <pau.gay@gmail.com> 
 */

define(LIB, dirname(__FILE__) . '/');

/**
 * Load the YAML parser script from Symfony Components that will help us 
 * to load the configuration files, if needed.
 */
require_once LIB . 'SymfonyComponents/YAML/sfYamlParser.php';

/**
 * Here there are some common functions that are handy.
 */
require_once LIB . 'functions.php';
