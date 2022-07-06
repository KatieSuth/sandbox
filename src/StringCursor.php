<?php

class StringCursor
{
    protected $inputString = [];
    protected $currentPos = 0;

    /**
     *  @param String $str
     *  @param String $ops
     *  @return String
     */
    public function stringOperation(string $str, string $ops)
    {
        $this->inputString = str_split($str);
        $opLength = strlen($ops);

        if (!in_array($ops[0], ['F', 'B', 'R'])) {
            throw new InvalidArgumentException('Not a valid operation');
        }

        $currentOp = $ops[0]; //start with the first operation

        for ($i = 1; $i < $opLength; $i++) {
            if (in_array($ops[$i], ['F', 'B', 'R']) || $i == $opLength - 1) { //we've run into the next operation (or hit the last), so determine what to do with the current one
                if ($i == $opLength - 1) { //we're at the last character of the string, so append it & check the operation
                    $currentOp .= $ops[$i];
                }

                $operation = strtoupper(substr($currentOp, 0, 1));
                $value = substr($currentOp, 1);

                switch ($operation) {
                    case 'F':
                        if (!is_numeric($value)) {
                            throw new InvalidArgumentException('Invalid movement value');
                        }

                        if (!$this->moveCursorForward($value)) {
                            throw new OutOfBoundsException('Cannot move past the end of the string');
                        }
                        break;
                    case 'B':
                        if (!is_numeric($value)) {
                            throw new InvalidArgumentException('Invalid movement value');
                        }

                        if (!$this->moveCursorBackward($value)) {
                            throw new OutOfBoundsException('Cannot move before the start of the string');
                        }
                        break;
                    case 'R':
                        if (strlen($value) != 1) {
                            throw new InvalidArgumentException('Invalid replacement value');
                        }
                        
                        $this->replaceChar($value);
                        break;
                    //would normally put in a "default" here but there isn't really a default case
                    //could alternatively use if/else if but I prefer the formatting of the switch for this
                }

                $currentOp = $ops[$i]; //done the operation, so start building the string again
            } else {
                $currentOp .= $ops[$i]; //probably hit a value
            }
        }

        return implode('', $this->inputString); //put the array back into a string and then return
    }

    /**
     *  @param Integer $spaces
     *  @return Boolean
     */
    protected function moveCursorForward($spaces)
    {
        $testPos = $this->currentPos += $spaces;

        if ($testPos >= count($this->inputString)) { //"equal to" because arrays start at 0
            return false;
        }

        $this->currentPos = $testPos;
        return true;
    }

    /**
     *  @param Integer $spaces
     *  @return Boolean
     */
    protected function moveCursorBackward($spaces)
    {
        $testPos = $this->currentPos -= $spaces;

        if ($testPos < 0) {
            return false;
        }

        $this->currentPos = $testPos;
        return true;
    }

    /**
     *  @param Char $spaces
     *  @return Boolean
     */
    protected function replaceChar($char)
    {
        $this->inputString[$this->currentPos] = $char;
        return true;
    }
}
