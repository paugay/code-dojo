<?php

require_once "Bank.php";

class BankTest extends PHPUnit_Framework_TestCase
{
    public function testSimpleEight()
    {
        $simpleInput =
            " _  _  _  _  _  _  _  _  _ \n"
          . "|_||_||_||_||_||_||_||_||_|\n"
          . "|_||_||_||_||_||_||_||_||_|\n"
          . "                           \n";

        $bank = new Bank();

        $code = $bank->parse($simpleInput);

        $this->assertEquals($code, "888888888");
    }

    public function testSingleEightDigit()
    {
        $simpleInput =
            " _ \n"
          . "|_|\n"
          . "|_|\n"
          . "   \n";

        $bank = new Bank();

        $code = $bank->parse($simpleInput);

        $this->assertEquals($code, "8");
    }

    public function test1to9Entry()
    {
        $simpleInput =
            "    _  _     _  _  _  _  _ \n"
          . "  | _| _||_||_ |_   ||_||_|\n"
          . "  ||_  _|  | _||_|  ||_| _|\n"
          . "                           \n";

        $bank = new Bank();

        $code = $bank->parse($simpleInput);

        $this->assertEquals($code, "123456789");
    }
}
