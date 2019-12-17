<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'title'     => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'category'  => $faker->randomElement(['Slider', 'Kegiatan', 'Dokumen']),
        'file'      => $faker->randomElement([
            'images/cover.svg',
        ])
    ];
});
