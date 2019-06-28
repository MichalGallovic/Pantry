<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
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

$factory->define(ShoppingList::class, function (Faker $faker) {
    return [
        'name' => $faker->name()
    ];
});

$factory->state(ShoppingList::class, 'with-items', []);
$factory->state(ShoppingList::class, 'with-grocery-items', []);

$factory->afterCreatingState(ShoppingList::class, 'with-items', function (ShoppingList $shoppingList) {
    $shoppingListItems = collect(range(0,10))
        ->map(function () {
            return factory(ShoppingListItem::class)->create();
        });

    $shoppingList->shoppingListItems()->saveMany($shoppingListItems);
});

$factory->afterCreatingState(ShoppingList::class, 'with-grocery-items', function (ShoppingList $shoppingList) {
    $shoppingListItems = collect(range(0,10))
        ->map(function () {
            return factory(ShoppingListItem::class)->state('with-grocery')->create();
        });

    $shoppingList->shoppingListItems()->saveMany($shoppingListItems);
});
