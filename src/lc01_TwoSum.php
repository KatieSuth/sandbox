<?php

class lc01_TwoSum {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     *
     *  A brute-force solution to the twoSum problem
     */
    function twoSum_Bad($nums, $target) {
        $count = count($nums);

        //works but bad
        for ($i = 0; $i < $count; $i++) {
            for ($j = 1; $j < $count; $j++) {
                $testSum = 0;

                if ($i == $j) {
                    continue;
                }

                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }

        return [];
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     *
     *  A more efficient solution to the twoSum problem
     *  Since there is **exactly** one solution and you
     *  can't use the same index more than once, then x + y = $target
     *  That can be rephrased as $y = $target - $x
     *  As a result, we can fill an array of $y values
     *  and reference it against $x in a loop
     */
    function twoSum_Good($nums, $target) {
        $count = count($nums);

        $seen = [];
        foreach ($nums as $key => $value) {
            $searchingFor = $target - $value;

            if (isset($seen[$value])) {
                return [$key, $seen[$value]];
            } else {
                $seen[$searchingFor] = $key;
            }
        }

        return [];
    }
}
