<?php

namespace App\Http\Controllers;

use Request;
use Validator;
Use Redirect;
use App\Article;
use App\User;
use App\Comment;
use App\Answer;


class CommentController extends Controller
{
    
    public function store(Article $article)
    {

        $input = Request::all();

        $validator = Validator::make($input,
        [
            'body' => 'required|min:5'
        ]);
        

        if ($validator->fails()) {

            return redirect('article/'. $article->id .'?come=comment&status=error#hr')->withInput()->withErrors($validator);

        }else {
            if (\Auth::check()) {

                Comment::create([
                        
                    'user_id' => \Auth::user()->id,
                    'article_id' => $article->id,
                    'body' => request('body')              
                ]);
            }

            return redirect('article/'. $article->id .'?come=comment&status=ok#hr');
		}

    }


    public function addAnswer(Comment $comment){

        $input = Request::all();

        $validator = Validator::make($input,
        [
            'answer' => 'required|min:10'
        ]);
        

        if ($validator->fails()) {

            return redirect('article/'. $comment->article_id .'?come=answer&box=pb'.$comment->id.'&status=error#pd'.$comment->id)->withInput()->withErrors($validator);

        }else{
            if (\Auth::check()) {

                Answer::create([
                        
                    'user_id' => \Auth::user()->id,
                    'comment_id' => $comment->id,
                    'answer' => request('answer')              
                ]);
            }

            return redirect('article/'. $comment->article_id .'?come=answer&box=pb'.$comment->id.'&status=ok#pd'.$comment->id);
		}

    }

}
