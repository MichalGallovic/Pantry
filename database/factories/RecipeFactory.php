<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Recipe;
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

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'servings' => random_int(-2147483648, 2147483647),
        'preparation_minutes' => random_int(0, 4294967295)
    ];
});
