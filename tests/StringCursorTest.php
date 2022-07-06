<?php
use PHPUnit\Framework\TestCase;

final class StringCursorTest extends TestCase
{
    private function getTestCases()
    {
        return ([
            [
                'Input' => [
                    'str' => 'abcdefghijklmn',
                    'ops' => 'F2B1F5Rw'
                ],
                'Output' => 'abcdefwhijklmn'
            ],
            [
                'Input' => [
                    'str' => 'The quick brown fox jumped over the lazy dogs',
                    'ops' => 'F24RsF1R F19R '
                ],
                'Output' =>  'The quick brown fox jumps  over the lazy dog '
            ],
        ]);
    }

    private function getExceptionCases()
    {
        return ([
            [
                'Input' => [
                    'str' => 'abcdefghijklmn',
                    'ops' => 'F2B4F5Rw'
                ],
                'Output' => 'abcdefwhijklmn',
                'Type' => OutOfBoundsException::class
            ],
        ]);
    }

    public function testStringOperation()
    {
        $testCases = $this->getTestCases();
        $exceptions = $this->getExceptionCases();

        foreach ($testCases as $case) {
            $solution = new StringCursor();
            $result = $solution->stringOperation($case['Input']['str'], $case['Input']['ops']);
            $this->assertEquals($case['Output'], $result);
        }

        foreach ($exceptions as $case) {
            $solution = new StringCursor();
            $this->expectException($case['Type']);
            $result = $solution->stringOperation($case['Input']['str'], $case['Input']['ops']);
        }
    }
}
