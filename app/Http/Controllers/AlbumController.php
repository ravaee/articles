<?php

namespace App\Http\Controllers;

use Request;
use App\Picture;
use Validator;
Use Redirect;
use App\Article;
use App\User;
use App\Comment;
use App\Album ;
use Response;


class AlbumController extends Controller
{
    
    public function store(Request $request){

        $input = Request::all();

        $validator = Validator::make($input,
        [
            'name' => 'required'
        ]);
         

        if ($validator->fails()) {

            return Response::json(['error' => 'نام را وارد کنید','status' => 'error'], 404);
            
        }else {
            if (\Auth::check()) {

                Album::create([
                        
                    'user_id' => \Auth::user()->id,
                    'name' => request('name')             
                ]);

                return response()->json(['comment' => 'آلبوم جدید اضافه شد','status' => 'done'], 200);
            }
    
            return;
		}
    }


    public function read(){

        $albums = Album::all();
        return Response::json(['data' => $albums,'status' => 'done'],200);
    }


    public function delete(Request $request){

        if(! $pictures = Picture::select()->where('album_id',request('album_id'))->get()){

            if( Album::where('id', request('album_id'))->delete()){

                return Response::json(['status' => 'done' , 'comment' => 'آلبوم با تمامی عکس هایش حذف شد.'],200);

            }else{

                return Response::json(['status' => 'error' , 'comment' => 'مشکلی در حذف آلبوم از دیتابیس ایجاد شد.'],200);
            }
        }

        foreach($pictures as $picture){

            $userArticles = Article::select()->where('user_id',\Auth::user()->id)->where('body','LIKE','%'.$picture->name.'%')->get();

            if($userArticles->count()>0){
    
                return Response::json(['status' => 'error' , 'comment' => 'یکی یا چند عدد از عکس های این آلبوم در مقالات شما استفاده شده است.'],200);
            }

        }

        foreach($pictures as $picture){

            if(!Picture::where('name', $picture->name)->delete()){

                return Response::json(['status' => 'error', 'comment' => 'خطا در حذف آلبوم از دیتابیس بوجود آمد ، '],200);
    
            }

            try{
    
                $url = Picture::select('url')->where('name', $picture->name)->first();
                \File::delete($url); 
    
            }catch(\Exception $e){
    
                return Response::json(['status' => 'error', 'comment' => 'خطا در حذف عکس های آلبوم از لوکال بوجود آمد ، '],200);
            }

        }

        if(Album::where('id', request('album_id'))->delete()){

            return Response::json(['status' => 'done' , 'comment' => 'آلبوم با تمامی عکس هایش حذف شد.'],200);
        }else{

            return Response::json(['status' => 'error' , 'comment' => 'مشکلی در حذف آلبوم از دیتابیس ایجاد شد.'],200);
        }

        
        

    }

}
