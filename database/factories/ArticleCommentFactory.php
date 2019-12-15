<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArticleComment;
use Faker\Generator as Faker;

$factory->define(ArticleComment::class, function (Faker $faker) {
    return [
        'article_id' => \App\Article::all()->random(),
        'review_id' => \App\Review::all()->random(),
    ];
});
