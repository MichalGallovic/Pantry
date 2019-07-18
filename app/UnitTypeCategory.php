<?php

namespace App;

final class UnitTypeCategory
{
    const VOLUME = 'volume';
    const WEIGHT = 'weight';
    const LENGTH = 'length';
    const TEMPERATURE = 'temperature';
    const QUANTITY = 'quantity';

    /** @var array */
    private static $map = [
        self::VOLUME => [
            UnitType::TEASPOON,
            UnitType::TABLESPOON,
            UnitType::FLUID_OUNCE,
            UnitType::CUP,
            UnitType::ML,
            UnitType::L,
            UnitType::DL,
        ],
        self::WEIGHT => [
            UnitType::POUND,
            UnitType::OUNCE,
            UnitType::MG,
            UnitType::GRAM,
            UnitType::KG
        ],
        self::LENGTH => [
            UnitType::MM,
            UnitType::CM,
            UnitType::M,
            UnitType::INCH
        ],
        self::TEMPERATURE => [
            UnitType::C,
            UnitType::F,
        ]
    ];

    /**
     * @param string $category
     *
     * @return array|null
     */
    public static function getUnitTypes($category)
    {
        if (!isset(static::$map[$category])) {
            return null;
        }

        return static::$map[$category];
    }

    private function __construct()
    {
    }
}
