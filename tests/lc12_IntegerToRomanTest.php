<?php
use PHPUnit\Framework\TestCase;

final class lc12_IntegerToRomanTest extends TestCase
{
    public function testIntToRoman()
    {
        $testCases = [
            'I'            => 1,
            'III'          => 3,
            'IV'           => 4,
            'VI'           => 6,
            'LVIII'        => 58,
            'DCCCLXXXVIII' => 888,
            'CMXCIX'       => 999,
            'M'            => 1000,
            'MCMXCIV'      => 1994
        ];

        $solution = new lc12_IntegerToRoman();
        foreach ($testCases as $roman => $num) {
            $result = $solution->intToRoman($num);
            $this->assertEquals($roman, $result);
        }
    }
}
