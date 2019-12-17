<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->realText($maxNbChars = 50, $indexSize = 1);
    
    return [
        'title'     => $title,
        'slug'      => Str::slug($title),
        'content'   => $faker->realText($maxNbChars = 1000, $indexSize = 5),
        'category'  => $faker->randomElement(['Blog', 'Kegiatan', 'Pengumuman']),
        'cover'     => $faker->randomElement([
            'images/cover.svg',
        ])
    ];
});
