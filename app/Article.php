<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Article extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'image',
        'viewCount',
        'commentCount',
        'cover_text'
    ];


    public function getRouteKeyName(){

        return 'id';
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function categories(){
 
        return $this->belongsToMany('App\Category', 'Category_Article');
    }

    public function views(){
 
        return $this->hasMany(Article_View::class);
    }

    public function actions(){
        
        return $this->hasMany(Action::class);
    }

}
