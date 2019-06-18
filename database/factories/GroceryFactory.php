<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Grocery;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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
        'unit_type' => $faker->sentence(),
        'price' => $faker->randomFloat(),
        'shop_id' => random_int(1, 10)
    ];
});
