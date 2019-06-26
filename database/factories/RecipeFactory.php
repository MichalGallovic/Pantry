<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Grocery;
use App\Recipe;
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

$factory->define(Recipe::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'servings' => random_int(1, 4),
        'preparation_minutes' => random_int(3, 20) * 5
    ];
});

$factory->afterCreating(Recipe::class, function (Recipe $recipe) {
    $recipeGroceries = collect(range(0,10))
        ->mapWithKeys(function () {
            $grocery = factory(Grocery::class)
                ->state(collect(['fruit', 'vegetable'])->random())
                ->create();
            return [$grocery->id => ['units' => random_int(4,10) * $grocery->units]];
        });

    $recipe->groceries()->attach($recipeGroceries);
});
