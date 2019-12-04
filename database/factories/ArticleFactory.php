<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'content' => $faker->realText($maxNbChars = 1000, $indexSize = 5),
        'category'  => $faker->randomElement(['Blog', 'Kegiatan', 'Pengumuman'])
    ];
});
