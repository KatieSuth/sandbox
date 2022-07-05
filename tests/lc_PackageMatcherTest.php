<?php
use PHPUnit\Framework\TestCase;

final class PackageMatcherTest extends TestCase
{
    private function getTestCases()
    {
        return ([
            [
                'Input' => ['Orange'],
                'Output' => []
            ],
            [
                'Input' => ['Cam'],
                'Output' => [
                    'M' => [
                        ['Cam']
                    ]
                ]
            ],
            [
                'Input' => ['Cam', 'Orange'],
                'Output' => [
                    'M' => [
                        ['Cam']
                    ]
                ]
            ],
            [
                'Input' => ['Cam', 'Game'],
                'Output' => [
                    'M' => [
                        ['Cam']
                    ],
                    'L' => [
                        ['Game']
                    ]
                ]
            ],
            [
                'Input' => ['Game', 'Blue'],
                'Output' => [
                    'L' => [
                        ['Game'],
                        ['Blue']
                    ]
                ]
            ],
            [
                'Input' => ['Game', 'Game', 'Blue'],
                'Output' => [
                    'L' => [
                        ['Game', 'Game'],
                        ['Blue']
                    ]
                ]
            ],
            [
                'Input' => ['Cam', 'Cam', 'Game', 'Game'],
                'Output' => [
                    'L' => [
                        ['Cam', 'Cam'],
                        ['Game', 'Game']
                    ]
                ]
            ],
            [
                'Input' => ['Cam', 'Cam', 'Cam', 'Game', 'Game', 'Game', 'Cam', 'Blue'],
                'Output' => [
                    'L' => [
                        ['Cam', 'Cam'],
                        ['Cam', 'Cam'],
                        ['Game', 'Game'],
                        ['Game'],
                        ['Blue']
                    ]
                ]
            ],
            [
                'Input' => ['Cam', 'Cam', 'Cam', 'Game', 'Game', 'Cam', 'Cam', 'Blue', 'Blue'],
                'Output' => [
                    'M' => [
                        ['Cam']
                    ],
                    'L' => [
                        ['Cam', 'Cam'],
                        ['Cam', 'Cam'],
                        ['Game', 'Game'],
                        ['Blue'],
                        ['Blue']
                    ]
                ]
            ],
        ]);
    }

    public function testPackageMatcher()
    {
        $testCases = $this->getTestCases();

        foreach ($testCases as $case)
        {
            $solution = new lc_PackageMatcher();
            $result = $solution->packageMatcher($case['Input']);

            foreach ($result as $boxType => $box) {
                $this->assertEqualsCanonicalizing($case['Output'][$boxType], $result[$boxType]);
            }
        }
    }
}
