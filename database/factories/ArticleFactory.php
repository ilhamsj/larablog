<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 50, $indexSize = 1),
        'content' => $faker->realText($maxNbChars = 1000, $indexSize = 5),
        'category'  => $faker->randomElement(['Blog', 'Kegiatan', 'Pengumuman']),
        'cover'     => $faker->randomElement([
            'images/alice-got-altered-it-goes-like-to-be-a-15122019015931.png',
            'images/bukti.jpg',
            'images/but-she-went-round-the-court-and-got-behind-him-15122019012826.JPG',
            'images/dormouse-was-just-missed-her-she-soon-began-15122019012053.JPG',
            'images/hehe-14122019032249.JPG',
            'images/IMG_0189.JPG',
            'images/instalasi-laravel-15122019020154.jpg',
            'images/is-a-natural-way-i-beg-for-such-a-very-15122019013210.png',
            'images/jasa-p-14122019032349.JPG',
            'images/jasa-pembuatan-website-14122019032155.JPG',
            'images/jasa-pembuatan-website-14122019102039.JPG',
            'images/mock-turtle-suddenly-upon-their-arguments-to-15122019011742.JPG',
            'images/quod-impedit-recusandae-laboriosam-earum-facere-14122019102024.JPG',
            'images/rerum-quo-voluptas-est-fugit-sit-15122019012800.pdf',
            'images/rerum-quo-voluptas-est-fugit-sit-15122019013133.JPG',
            'images/voluptatem-14122019032325.JPG',
        ])
    ];
});
