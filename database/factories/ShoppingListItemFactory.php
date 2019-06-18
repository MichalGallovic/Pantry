<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\ShoppingListItem;
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

$factory->define(ShoppingListItem::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'order' => random_int(-2147483648, 2147483647),
        'completed' => $faker->boolean(),
        'shopping_list_id' => random_int(1, 10)
    ];
});
