<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Document::class, function (Faker $faker) {

    $title = $faker->realText($maxNbChars = 50, $indexSize = 1);
    return [
        'title'     => $title,
        'category'  => $faker->randomElement(['Slider', 'Kegiatan', 'Dokumen']),
        'file'      => $faker->randomElement([
            'images/cover.svg',
        ])
    ];
});
