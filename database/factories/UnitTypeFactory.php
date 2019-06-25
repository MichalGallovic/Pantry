<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UnitType;
use App\UnitTypeCategory;

$factory->define(UnitType::class, function () {
    $category = collect([
        UnitTypeCategory::WEIGHT,
        UnitTypeCategory::TEMPERATURE,
        UnitTypeCategory::LENGTH,
        UnitTypeCategory::VOLUME
    ])->random();

    return [
        'shorthand' => collect(UnitTypeCategory::getUnitTypes($category))->random(),
        'category' => $category
    ];
});

$factory->state(UnitType::class, UnitTypeCategory::VOLUME, [
     'shorthand' => collect(UnitTypeCategory::getUnitTypes(UnitTypeCategory::VOLUME))->random(),
     'category' => UnitTypeCategory::VOLUME
]);

$factory->state(UnitType::class, UnitTypeCategory::WEIGHT, [
    'shorthand' => collect(UnitTypeCategory::getUnitTypes(UnitTypeCategory::WEIGHT))->random(),
    'category' => UnitTypeCategory::WEIGHT
]);

$factory->state(UnitType::class, UnitTypeCategory::LENGTH, [
    'shorthand' => collect(UnitTypeCategory::getUnitTypes(UnitTypeCategory::LENGTH))->random(),
    'category' => UnitTypeCategory::LENGTH
]);

$factory->state(UnitType::class, UnitTypeCategory::TEMPERATURE, [
    'shorthand' => collect(UnitTypeCategory::getUnitTypes(UnitTypeCategory::TEMPERATURE))->random(),
    'category' => UnitTypeCategory::TEMPERATURE
]);
