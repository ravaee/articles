<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Action extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'article_id',
        'hasLiked',
        'hasView',
        'hasComment'
    ];


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function article(){

        return $this->belongsTo(Article::class);
    }


}
