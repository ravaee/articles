<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Utilities\Util;
use App\User;
use App\Action;
use App\Answer;
use App\Article_View;
use App\Comment;
Use Redirect;
Use Auth;


class ArticleController extends Controller
{
    public function index()
    {

        $articles = Article::latest()->paginate(8);
        return view('articles.index',\compact('articles'));
    }


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {

        $this->validate(request() , [
            'title' => 'required',
            'body' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'cover_text' => 'required|min:150|max:300'
        ]);

        if ($request->filled('categories')) {

            $article = new Article;

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $name = Util::persianSlug($request->title).'.'.$image->getClientOriginalExtension().(string)rand();
                $destinationPath = public_path('/images/articles_header_image');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $article->image = $name;
    
            }else{
                return Redirect::back()->withInput($request->all())->withErrors(['لطفا عکس پوششی مقاله را انتخاب کنید.']);
            }

            try {
                
                $article->user_id = Auth::user()->id;
                $article->title = $request->title;
                $article->slug = Util::persianSlug($request->title);
                $article->body = $request->body;
                $article->cover_text = $request->cover_text;
                $article->categories()->attach($request->categories);

                $article->save();
            }
            
            catch (\Exception $e) {
                return $e->getMessage();
            }

            return redirect('/');

        }else{
            
            return Redirect::back()->withInput($request->all())->withErrors(['حداقل باید یک سبک برای مقاله انتخاب کنی.']);
        }
    }


    public function show(Article $article){

        $ip = Request()->ip();
        // $clientDetails = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
        // return $clientDetails;

        if(!Article_View::select()->where('ip', $ip)->where('article_id',$article->id)->exists()){

            $av = new Article_View();
            
            $av->ip = $ip;
            $av->user_id = (Auth::check()) ? Auth::user()->id  : 0;
            $av->article_id = $article->id;
            $av->save();

            $article->viewCount += 1;
            $article->save();
        }

        $comments = $article->comments()->get();

        if (Auth::check()) {
            
            $user = Auth::user();            

            $userAction = Action::select()->where('user_id',$user->id)->where('article_id',$article->id)->first();

            if($userAction != null){

                $htmlClass = ($userAction->hasLiked) ? 'fa-heart' : 'fa-heart-o';
            }else{

                $htmlClass = 'fa-heart-o';
            }
            
            return view('articles.show' , compact('article','comments','userAction','htmlClass'));
        }

        return view('articles.show' , compact('article','comments'));
    }


    public function like(Request $request)
    {
        
        try{

            $article = Article::find(request('id'));

            $user = Auth::user();

            $userAction = Action::select()->where('user_id',$user->id)->where('article_id',$article->id)->first();

            if($userAction==null){

                $userAction = new Action();
            
                $userAction->article_id = $article->id;
                $userAction->user_id = $user->id;
            }

            if(!$userAction->hasLiked){

                $article->like = $article->like + 1;
                $userAction->hasLiked = true;

                if($userAction->save())
                    $article->save();
    
                return response()->json(['comment' => 'like','like_count' => $article->like,'status' => 'done'], 200);

            }else{

                $article->like = $article->like - 1;
                $userAction->hasLiked = false;

                if($userAction->save())
                    $article->save();
    
                return response()->json(['comment' => 'unlike','like_count' => $article->like,'status' => 'done'], 200);
            }

            return response()->json(['comment' => 'قبلا لایک کردی','status' => 'error'], 401);

        }catch (\Exception $e) {
            
            return response()->json(['comment' => $e->getMessage(),'status' => 'error'], 500);
        }

    }
}
