<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article_View extends Model
{
    protected $fillable = [

        'article_id',
        'ip',
        'user_id'
    ];

    public $table = "article_view";


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function article(){

        return $this->belongsTo(Article::class);
    }


}
