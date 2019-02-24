<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'count'
    ];

    public function articles(){

        return $this->belongsToMany('App\Article', 'Category_Article');
    }
}
