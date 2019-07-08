<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Grocery;
use App\ShoppingList;
use App\ShoppingListItem;
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

$factory->define(ShoppingListItem::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'order' => random_int(0, 100),
        'completed' => $faker->boolean()
    ];
});

$factory->state(ShoppingListItem::class, 'with-grocery', function () {
    return [
        'grocery_id' => function () {
            return factory(Grocery::class)->state('fruit')->create()->id;
        },
        'name' => null
    ];
});
