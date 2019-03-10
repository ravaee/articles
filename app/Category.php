<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @property int $Id
 * @property string $name
 * @property int count
 */
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
