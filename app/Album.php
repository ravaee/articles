<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Album extends Model
{

    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }


}
