<?php

class lc13_Solution
{
    
    public $roman;   //array of roman numerals
    public $oLength; //original length
    public $map = [  //value map
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];
    
    /**
     * @param String $s
     * @return Integer
     *
     *  Initialize a "queue" (PHP has a built-in queue object, but this is a very simple case that 
     *  really only needs initialization, "peek," and "pop" operations, so we're using a basic array).
     *  The constraints specified that we can always rely on the input being a valid roman numeral,
     *  so we aren't going to check for validity such as "IIII" != "IV"; we're only going to look
     *  ahead for valid pairs when validating the roman numerals, then sum the values and return
     *  the sum
     */
    function romanToInt($s)
    {
        $this->roman = str_split($s);
        $this->oLength = count($this->roman);
        $sum = 0;
        $i = 0;

        do {
            $current = $this->map[$this->roman[$i]];

            if ($this->checkValidPair($i)) {
                $next = $this->map[$this->roman[($i + 1)]];
                $sum += ($next - $current);
                unset($this->roman[$i]);
                unset($this->roman[($i + 1)]);
                $i += 2;
            } else {
                $sum += $current;
                unset($this->roman[$i]);
                $i++;
            }
        } while (count($this->roman) > 0);
        
        return $sum;
    }

     /**
     * @param Integer $i
     * @return Boolean
     */ 
    function checkValidPair($i) {
        if ($i + 1 < $this->oLength) {
            $current = $this->roman[$i];
            $next = $this->roman[($i + 1)];

            if ($current == 'I' && ($next == 'V' || $next == 'X')) {
                return true;
            }

            if ($current == 'X' && ($next == 'L' || $next == 'C')) {
                return true;
            }

            if ($current == 'C' && ($next == 'D' || $next == 'M')) {
                return true;
            }
        }

        return false;
    }
}
