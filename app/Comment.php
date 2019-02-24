<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = [

        'article_id',
        'body',
        'viewCount',
        'user_id',
    ];


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
