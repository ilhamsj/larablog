<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Article()
    {
        return $this->belongsToMany('App\Article', 'article_comments');
    }
}
