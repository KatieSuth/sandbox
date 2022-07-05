<?php
use PHPUnit\Framework\TestCase;

final class lc12_IntegerToRomanTest extends TestCase
{
    private function getTestCases()
    {
        return ([
            'I'            => 1,
            'III'          => 3,
            'IV'           => 4,
            'VI'           => 6,
            'LVIII'        => 58,
            'DCCCLXXXVIII' => 888,
            'CMXCIX'       => 999,
            'M'            => 1000,
            'MCMXCIV'      => 1994
        ]);
    }

    public function testIntToRoman()
    {
        $testCases = $this->getTestCases();

        $solution = new lc12_IntegerToRoman();
        foreach ($testCases as $roman => $num) {
            $result = $solution->intToRoman($num);
            $this->assertEquals($roman, $result);
        }
    }
}
