<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
Use Redirect;
use App\Article;
use App\User;
use App\Comment;
use App\Album;
use App\Picture;
use Response;

class PictureController extends Controller
{
    
    //create picture
    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input,
        [
            'name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'album_id' => 'required'
        ]);
         

        if ($validator->fails()) {

            return Response::json(['comment' => 'اطلاعات را به درستی وارد کنید','status' => 'error'], 404);
            
        }else {

            $picture = new Picture;

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $name = request('name').'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/user_album/'.\Auth::user()->id.'/'.request('album_id'));
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                
            }else{
                return Redirect::back()->withInput($request->all())->withErrors(['لطفا عکس را انتخاب کنید.']);
            }

            try {
                $picture->url = '/images/user_album/'.\Auth::user()->id.'/'.request('album_id') . '/' . request('name').'.'.$image->getClientOriginalExtension();
                $picture->name = $name;
                $picture->album_id = request('album_id');
                $picture->save();
            }
            
            catch (\Exception $e) {

                return Response::json(['comment' => $e ,'status' => 'error'], 404);
            }

            return response()->json(['album_id' => request('album_id') ,'comment' => 'عکس جدید اضافه شد','status' => 'done'], 200);
		}
    }

    //get pictures
    public function read(Request $request)
    {
        $pictures = Picture::select()->where('album_id',request('album_id'))->get();
        return Response::json(['data' => $pictures,'status' => 'done'],200);
    }

    //delete picture
    public function delete(Request $request)
    {

        $userArticles = Article::select()->where('user_id',\Auth::user()->id)->where('body','LIKE','%'.request('name').'%')->get();

        if($userArticles->count()>0){

            return Response::json(['status' => 'error' , 'comment' => 'این عکس در یکی یا چند مقاله شما استفاده شده است'],200);
        }


        try{
            Picture::where('name', request('name'))->delete();

        }catch(\Exception $e){

            return Response::json(['e' => $e,'status' => 'error', 'comment' => 'خطا در حذف عکس از دیتابیس بوجود آمد ، '],200);
        }

        try{

            $url = Picture::select('url')->where('name', request('name'))->first();
            \File::delete($url); 

        }catch(\Exception $e){

            return Response::json(['status' => 'error', 'comment' => 'خطا در حذف مقاله از لوکال بوجود آمد ، '],200);
        }

        return Response::json(['status' => 'done' , 'comment' => 'عکس مورد نظر حذف شد.'],200);
        
        






        
    }
}
