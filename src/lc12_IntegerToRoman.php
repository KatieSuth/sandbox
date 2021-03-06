<?php

class lc12_IntegerToRoman
{
    public $map = [  //value map
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1,
    ];
    
    /**
     * @param Integer $num
     * @return String
     *
     *  Loops through a map of Roman numerals ordered from greatest to 
     *  least and subtracts from $num until $num == 0 to determine the 
     *  correct Roman numeral value for $num
     */
    function intToRoman($num)
    {
        $roman = '';
        
        foreach ($this->map as $numeral => $value) {
            if ($num == 0) {
                break;
            }

            $tmpResult = floor($num / $value);
            
            if ($tmpResult > 0) {
                $roman .= str_repeat($numeral, $tmpResult);
                $num -= ($tmpResult * $value);
            }
        }
        
        return $roman;
    }
}
