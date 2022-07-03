<?php
use PHPUnit\Framework\TestCase;

final class lc01_TwoSumTest extends TestCase
{
    private function getTestCases()
    {
        return (
            [
                [
                    'nums' => [2, 7, 11, 15],
                    'target' => 9,
                    'expected' => [0, 1]
                ],
                [
                    'nums' => [3, 2, 4],
                    'target' => 6,
                    'expected' => [2, 1]
                ],
                [
                    'nums' => [3, 3],
                    'target' => 6,
                    'expected' => [0, 1]
                ],
                [
                    'nums' => [-5, 0, 2, 11, 15, 7],
                    'target' => 9,
                    'expected' => [2, 5]
                ],
                [
                    'nums' => [0, 3, 2, 0],
                    'target' => 0,
                    'expected' => [0, 3]
                ],
                [
                    'nums' => [-5, 0, 2, 11, 15, 7],
                    'target' => 9,
                    'expected' => [2, 5]
                ]
            ]
        );
    }

    public function testTwoSum_Bad()
    {
        $testCases = $this->getTestCases()

        $solution = new lc01_TwoSum();
        foreach ($testCases as $case) {
            $result = $solution->twoSum_Bad($case['nums'], $case['target']);

            foreach ($result as $r) {
                $this->assertContains($r, $case['expected']);
            }
        }
    }

    public function testTwoSum_Good()
    {
        $testCases = $this->getTestCases();

        $solution = new lc01_TwoSum();
        foreach ($testCases as $case) {
            $result = $solution->twoSum_Bad($case['nums'], $case['target']);

            foreach ($result as $r) {
                $this->assertContains($r, $case['expected']);
            }
        }
    }
}
