<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id'   => \App\User::find(rand(1, 2)),
        'category'  => $faker->randomElement(['Review', 'Komentar']),
        'content'   => $faker->realText($maxNbChars = 200, $indexSize = 5),
    ];
});
