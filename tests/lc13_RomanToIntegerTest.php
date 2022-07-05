<?php
use PHPUnit\Framework\TestCase;

final class lc13_RomanToIntegerTest extends TestCase
{
    private function getTestCases()
    {
        return ([
            1 => 'I',
            3 => 'III',
            4 => 'IV',
            6 => 'VI',
            58 => 'LVIII',
            888 => 'DCCCLXXXVIII',
            898 => 'DCCCXCVIII',
            999 => 'CMXCIX',
            1994 => 'MCMXCIV'
        ]);
    }

    public function testRomanToInt()
    {
        $testCases = $this->getTestCases();

        $solution = new lc13_RomanToInteger();
        foreach ($testCases as $sum => $roman) {
            $result = $solution->romanToInt($roman);
            $this->assertEquals($sum, $result);
        }
    }
}
