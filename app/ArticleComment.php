<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $fillable = ['article_id', 'review_id'];
}
