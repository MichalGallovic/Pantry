<?php

use App\UnitType;
use App\UnitTypeCategory;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitTypesMap = [
            UnitTypeCategory::VOLUME => [
                UnitType::TEASPOON,
                UnitType::TABLESPOON,
                UnitType::FLUID_OUNCE,
                UnitType::CUP,
                UnitType::ML,
                UnitType::L,
                UnitType::DL
            ],
            UnitTypeCategory::WEIGHT => [
                UnitType::POUND,
                UnitType::OUNCE,
                UnitType::MG,
                UnitType::GRAM,
                UnitType::KG
            ],
            UnitTypeCategory::LENGTH => [
                UnitType::MM,
                UnitType::CM,
                UnitType::M,
                UnitType::INCH
            ],
            UnitTypeCategory::TEMPERATURE => [
                UnitType::C,
                UnitType::F
            ],
            UnitTypeCategory::QUANTITY => [
                UnitType::BOTTLE,
                UnitType::CAN,
                UnitType::PACK,
                UnitType::PIECE
            ]
        ];

        foreach ($unitTypesMap as $category => $unitTypes) {
            foreach ($unitTypes as $unitType) {
                UnitType::create([
                    'shorthand' => $unitType,
                    'category' => $category
                ]);
            }
        }
    }
}
