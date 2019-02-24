@extends('./layouts/layout')

@section('content')

<br>    
    <div class="row">

        <div class="col-lg-10 col-md-8 col-sm-6 col-xs-12">
            <h3 class="article_title_inner">
             ثبت نام در   <a class="a" href="/">لوپین</a>

            </h3>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <br>

            <span style="font-weight:bold; float:left;"> <i class="fa fa-exclamation-triangle" style="font-size:20px" aria-hidden="true"></i> &nbsp <a href="#" class="a">مشکلی در ثبت نام دارید؟ </a> </span>

        </div>
    </div>
    <hr class="solid">

    <div class="pane">

        <div class="pane_header">
            <h4 style="font-weight:bold;">فرم ثبت نام</h4>
            <p style="margin-top:10px;">یک قدم تا تبدیل شدن به یه لوپر</p>
            <hr class="">
        </div>

        

        <div class="panel-body ">
            <form method="POST" class="form-horizontal col-md-6 col-lg-4" action="{{ route('register') }}">
                @csrf

                @include("layouts/errors")

                <br>

                <label for="firstname" class="col-md-4 col-form-label text-md-right">نام</label>
                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" >

                <br>

                <label for="lastname" class="col-md-4 col-form-label text-md-right">نام خانوادگی</label>
                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" >


                <br>

                <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >



                <br>

                <label for="password"  class="col-md-4 col-form-label text-md-right" >گذرواژه</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                <br>

                <label for="password-confirm"  class="col-md-4 col-form-label text-md-right" >تایید گذرواژه</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                <br>



                <button type="submit" class="btn btn-success">
                    ثبت نام
                </button>

                <br><br>


            </form>
        </div>
    </div>

    <br><br><br><br><br>
@endsection
