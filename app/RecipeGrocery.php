<?php

namespace App;

class RecipeGrocery
{
    /** @var int */
    private $groceryId;

    /** @var int */
    private $units;

    /**
     * @param int $groceryId
     * @param int $units
     */
    public function __construct($groceryId, $units)
    {
        $this->groceryId = $groceryId;
        $this->units     = $units;
    }

    /**
     * @return int
     */
    public function getGroceryId()
    {
        return $this->groceryId;
    }

    /**
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }
}
