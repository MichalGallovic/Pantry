<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    $addedAt = $faker->dateTimeBetween('-10 days', 'now');
    $openedAt = (clone $addedAt)->add(new DateInterval('P1D'));

    return [
        'amount' => random_int(1, 10),
        'added_at' => $addedAt,
        'opened_at' => random_int(0, 1) ? $openedAt : null
    ];
});
