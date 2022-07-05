<?php

class Box
{
    protected $boxType = '';
    protected $items = [];

    protected $boxOpts = [
        'M' => [
            'Cam' => 1
        ],
        'L' => [
            'Cam' => 2,
            'Game' => 2,
            'Blue' => 1
        ]
    ];

    public function __construct($item)
    {
        $result = $this->tryAddItem($item);
        if ($result) {
            return $this;
        } else {
            return false;
        }
    }

    /*** GETTERS ***/

    public function getItemCount()
    {
        return count($this->items);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getBoxType()
    {
        return $this->boxType;
    }

    /*** SETTERS ***/

    public function tryAddItem($item)
    {
        if (!empty($this->items) && !in_array($item, $this->items)) {
            return false;
        }

        $type = $this->boxType == 'L' ? 'L' : 'M';

        $canAdd = $this->canAddToBoxByType($item, $type);

        if ($type == 'M' && !$canAdd) {
            $type = 'L';
            $canAdd = $this->canAddToBoxByType($item, $type);
        }

        if ($canAdd) {
            $this->boxType = $type;
            $this->items[] = $item;
        }

        return $canAdd;
    }

    /*** ------- ***/

    private function canAddToBoxByType($item, $box)
    {
        if (!isset($this->boxOpts[$box][$item])) {
            return false;
        }

        if ($this->getItemCount() < $this->boxOpts[$box][$item]) {
            return true;
        } else {
            return false;
        }
    }
}
