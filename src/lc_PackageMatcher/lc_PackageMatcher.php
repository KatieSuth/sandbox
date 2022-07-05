<?php

class lc_PackageMatcher
{
    protected $boxes = [];

    /**
     * @param Array $items
     * @return Array
     */
    public function packageMatcher(Array $items)
    {
        foreach ($items as $item) {
            $this->tryAddToBox($item);
        }

        $boxReturn = [];

        foreach ($this->boxes as $box) {
            if (!isset($boxReturn[$box->getBoxType()])) {
                $boxReturn[$box->getBoxType()] = [];
            }

            $boxReturn[$box->getBoxType()][] = $box->getItems();
        }

        return $boxReturn;
    }

    /**
     * @param String $item
     * @return Boolean
     */
    private function tryAddToBox($item)
    {
        foreach ($this->boxes as $box) {
            $result = $box->tryAddItem($item);

            if ($result) {
                return true;
            }
        }

        //couldn't add to any of the current boxes, make a new box
        return $this->addNewBox($item);
    }

    /**
     *  @param string $item
     *  @return Boolean
     *
     *  Create a new Box object and set it as the current box
     *  Return true if successful, false if box couldn't be created
     */
    private function addNewBox($item)
    {
        $box = new Box($item);
        if ($box->getItemCount() > 0) {
            $this->boxes[] = $box;
            return true;
        } else {
            unset($box);
            return false;
        }
    }
}
