<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Picture extends Model
{

    protected $fillable = [
        'album_id',
        'name'
    ];

    public function album()
    {
        return $this->belongsTo('App\Album');
    }


}
