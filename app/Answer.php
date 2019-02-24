<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Answer extends Model
{

    protected $fillable = [
        'comment_id',
        'answer',
        'user_id'
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }



}
