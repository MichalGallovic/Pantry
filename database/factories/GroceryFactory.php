<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Grocery;
use App\Shop;
use App\UnitType;
use App\UnitTypeCategory;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Grocery::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'expiration_days' => random_int(3, 60),
        'units' => random_int(1, 500),
        'unit_type_id' => function () {
            return factory(UnitType::class)->create()->id;
        },
        'price' => $faker->randomNumber(2),
        'shop_id' => function () {
            return factory(Shop::class)->create()->id;
        }
    ];
});

$factory->state(Grocery::class, 'fruits', function (Faker $faker) {
    return [
        'name' => collect(['Apple', 'Orange', 'Strawberies'])->random(),
        'units' => random_int(200, 500),
        'unit_type_id' => function () {
            return factory(UnitType::class)->state(UnitTypeCategory::WEIGHT)->create()->id;
        },
        'price' => $faker->randomNumber(2)
    ];
});

$factory->state(Grocery::class, 'vegetables', function (Faker $faker) {
    return [
        'name' => collect(['Potatoes', 'Tomatoes', 'Peppers'])->random(),
        'units' => random_int(200, 500),
        'unit_type_id' => function () {
            return factory(UnitType::class)->state(UnitTypeCategory::WEIGHT)->create()->id;
        },
        'price' => $faker->randomNumber(2)
    ];
});
