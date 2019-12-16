<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'title'     => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'category'  => $faker->randomElement(['Slider', 'Kegiatan', 'Dokumen']),
        'file'      => $faker->randomElement([
            'images/24f710eba204453c8365f9a15b1834dc.png',
            'images/alice-again-for-its-voice-same-as-yet-a-15122019115136.png',
            'images/alice-thats-right-shouted-the-sands-are-15122019044420.png',
            'images/alices-shoulder-with-a-hint-to-feel-with-a-15122019045028.png',
            'images/barang-barang-berguna-15122019045531.JPG',
            'images/jasa-pembuatan-website-15122019045317.jpg',
            'images/kegiatan-taman-lansia-15122019045500.JPG',
            'images/makan-bareng-dirumah-masing-masing-15122019045141.png',
            'images/rerum-quo-voluptas-est-fugit-sit-15122019045346.JPG',
            'images/she-carried-it-happens-and-the-little-alice-15122019115017.png',
        ])
    ];
});
