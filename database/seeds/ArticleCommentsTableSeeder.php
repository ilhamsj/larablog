<?php

use Illuminate\Database\Seeder;

class ArticleCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ArticleComment', 5)->create();
    }
}
