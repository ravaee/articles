<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

/**
 * Class Article
 * @package App
 * @property Category[] $categories
 * @property string catText All categories separated by comma.
 */
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

    /**
     * Attribute: catText
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    protected function getCatTextAttribute() {
        $categoryText = "";
        // If article belongs to one or more categories.
        if (!$this->categories->isEmpty()) {
            // Style of comma.
            $comma = trans("sign.comma") . " ";
            // Convert all categories to a comma separated text.
            foreach ($this->categories as $cat) {
                $categoryText .= $cat->name . $comma;
            }
            // Remove last extra comma.
            $categoryText = mb_substr($categoryText, 0, mb_strlen($comma) * -1);
        } else {
            // Alternative text when there is no categories for this article.
            $categoryText = trans("main.uncat");
        }

        return $categoryText;
    }
}
