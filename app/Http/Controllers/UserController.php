<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Article;
use App\Utilities\Util;
use App\User;
use App\Action;
use App\Answer;
use App\Article_View;
use App\Comment;
Use Redirect;
Use Auth;


class UserController extends Controller
{

    public function show($user){

        if($user == null){
            return view('shared.notFound');
        }

        return view('users.personal',compact('user',$user));

    }

    public function edit(){

        $user = Auth::user();
        return view('users.edit',compact('user',$user));

    }

    public function edit_basic_information(Request $request){

        $input = Request()->all();

        $validator = Validator::make($input,
        [
            'firstname' => 'required|min:2|max:20',
            'lastname' => 'required|min:2|max:20',
            'job' => 'required|min:5|max:100',
            'like' => 'required|min:10|max:100'
        ]);

        if ($validator->fails()) {
            return Redirect('/profile/edit#basic')->withInput()->withErrors($validator)->with('type','basic');
        }

        try{

            $user = Auth::user();

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->job = $request->job;
            $user->likes = $request->like;

            $user->save();

            return Redirect('/profile/edit#basic')->withInput()->with('msg','اطلاعات با موفقیت ذخیره شد')->with('status','success')->with('type','basic');
        }catch(Exception $e){

            return view('shared.internalError');
        }
    }


    public function edit_secondary_information(Request $request){

        $input = Request()->all();

        $validator = Validator::make($input,
        [
            'bio' => 'required|min:2|max:500',
            'from' => 'required|min:2|max:50',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect('/profile/edit#sec')->withInput()->withErrors($validator)->with('type','sec');
                
        }
        
        try{
    
            $user = Auth::user();

            $user->bio = $request->bio;
            $user->from = $request->from;
            $user->gender = $request->gender;

            $user->save();

            return Redirect('/profile/edit#sec')->withInput()->with('msg','اطلاعات با موفقیت ذخیره شد')->with('status','success')->with('type','sec');

        }catch(Exception $e){

            return view('shared.internalError');
        }
    
    }

    public function edit_setting_information(Request $request){

        $input = Request()->all();

        try{
    
            $user = Auth::user();

            if(Request()->alow_talk == 1){
                $user->allow_talk = 1;
            }else{
                $user->allow_talk = 0;
            }

            if(Request()->profile_disable == 1){
                $user->profile_diasble = 1;
            }else{
                $user->profile_diasble = 0;
            }

            $user->save();

            return Redirect('/profile/edit#set')->withInput()->with('msg','اطلاعات با موفقیت ذخیره شد')->with('status','success')->with('type','set');

        }catch(Exception $e){

            return view('shared.internalError');
        }
    
    }


}
