<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    // Volume
    const TEASPOON = 'tsp';
    const TABLESPOON = 'tbsp';
    const FLUID_OUNCE = 'fl_oz';
    const CUP = 'cup';
    // milliliter
    const ML = 'ml';
    // liter
    const L = 'l';
    // deciliter
    const DL = 'dl';

    // Weight
    const POUND = 'lb';
    const OUNCE = 'oz';
    // milligram
    const MG = 'mg';
    const GRAM = 'g';
    const KG = 'kg';

    // Length
    // millimeter
    const MM = 'mm';
    // centimeter
    const CM = 'cm';
    // meter
    const M = 'm';
    // inch
    const INCH = 'in';

    // Temperature
    // celsius
    const C = 'C';
    // fahrenheit
    const F = 'F';

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groceries()
    {
        return $this->hasMany(Grocery::class);
    }
}
