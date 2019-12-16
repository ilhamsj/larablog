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
            'images/2f7a1731-0edf-4b20-86eb-80ff6bc24f4f.jpg',
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
