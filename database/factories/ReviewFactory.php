<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id'   => 1,
        'category'  => $faker->randomElement(['Review', 'Komentar']),
        'content'   => $faker->realText($maxNbChars = 200, $indexSize = 5),
    ];
});
