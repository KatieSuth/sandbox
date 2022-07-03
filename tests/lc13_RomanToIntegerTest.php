<?php
use PHPUnit\Framework\TestCase;

final class lc13_RomanToIntegerTest extends TestCase
{
    public function testRomanToInt()
    {
        $testCases = [
            1 => 'I',
            3 => 'III',
            4 => 'IV',
            6 => 'VI',
            58 => 'LVIII',
            888 => 'DCCCLXXXVIII',
            898 => 'DCCCXCVIII',
            999 => 'CMXCIX',
            1994 => 'MCMXCIV'
        ];

        $solution = new lc13_RomanToInteger();
        foreach ($testCases as $sum => $roman) {
            $result = $solution->romanToInt($roman);
            $this->assertEquals($sum, $result);
        }
    }
}
