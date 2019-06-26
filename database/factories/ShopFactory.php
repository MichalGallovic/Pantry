<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Grocery;
use App\Shop;
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
$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name()
    ];
});

$factory->state(Shop::class, 'with-groceries', []);

$factory->afterCreatingState(Shop::class, 'with-groceries', function (Shop $shop) {
    $fruits = collect(range(0,10))
        ->map(function () {
            return factory(Grocery::class)->state('no-shop:fruit')->create();
        });

    $vegetables = collect(range(0,10))
        ->map(function () {
            return factory(Grocery::class)->state('no-shop:vegetable')->create();
        });

    $shop->groceries()->saveMany($fruits);
    $shop->groceries()->saveMany($vegetables);
});
