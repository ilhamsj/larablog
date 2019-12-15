<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'category', 'cover', 'slug'
    ];

    public function Review()
    {
        return $this->belongsToMany('App\Review', 'article_comments');
    }

    public function ArticleComment()
    {
        return $this->hasMany('App\ArticleComment');
    }
}
