<?php

class Bank
{
    public function parse($input)
    {
        $result = "";

        $codeArray = explode("\n", $input);

        while (strlen($codeArray[0]) >= 3)
        {
            $char = $this->parseCharacter(
                substr($codeArray[0], 0, 3)
                . substr($codeArray[1], 0, 3)
                . substr($codeArray[2], 0, 3)
                . substr($codeArray[3], 0, 3)
            );

            $result .= $char;

            for ($i = 0; $i < 4; $i++)
            {
                $codeArray[$i] = substr($codeArray[$i], 3);
            }
        }

        return $result;
    }

    public function parseCharacter($character)
    {
        switch ($character)
        {
            case "     |  |   ":
                return "1";
            case " _  _||_    ":
                return "2";
            case " _  _| _|   ":
                return "3";
            case "   |_|  |   ":
                return "4";
            case " _ |_  _|   ":
                return "5";
            case " _ |_ |_|   ":
                return "6";
            case " _   |  |   ":
                return "7";
            case " _ |_||_|   ":
                return "8";
            case " _ |_| _|   ":
                return "9";
            default:
                return "0";
        }
    }
}
