@extends('./layouts/layout')

@section('styles')

@endsection

@section('content')

    <br>    
    <div class="row">

        <div class="col-lg-10 col-md-8 col-sm-6 col-xs-12">
            <h3 class="article_title_inner">
            ویرایش پروفایل کاربری : {{ $user->name}} 


            </h3>
        </div>
        
    </div>
    <hr class="solid">

    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">

    @include('components.profileSidebar')
        <br>
        <br>
    </div>

    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

        <div id="basic" class="pane">
            <div class="pane_header">
                <h4 style="font-weight:bold;">اطلاعات اصلی</h4>
                <p style="margin-top:10px;">با وارد کردن این اطلاعات حساب شما فعال میشود. </p>
                <hr class="solid">
            </div>

            <div class="panel-body">
          
                <form accept-charset="UTF-8" method="post" action = "/profile/edit/user" class="form-horizontal col-md-6 ">

                    {!! csrf_field() !!}

                    @if(session()->get( 'type' )  === "basic")
                        @include('layouts.errors')
                    @endif

                    @if(session()->get( 'status' ) === "success" &&  session()->get( 'type' )  === "basic")
                    <div class="alert alert-success">
                        <strong>موفق!</strong> اطلاعات اصلی شما با موفقیت ذخیره شد
                    </div>
                    @endif

                    <label for="First_name">نام</label>
                    <input type="text" class="form-control" name="firstname" placeholder="اسمت رو وارد کن" value="{{ old('firstname') ?: $user->firstname }}" >
                    <br>
                    <label for="Last_name">نام خانوادگی</label>
                    <input type="text" class="form-control" name="lastname" placeholder="فامیلیت رو وارد کن" value="{{ old('lastname') ?: $user->lastname }}">
                    <br>
                    <label for="slogan">علاقه مند به</label>
                    <input type="text" class="form-control" name="like" placeholder="چند تا چیز که بهش علاقه داریو بنویس" value="{{ old('like') ?: $user->likes }}">
                    <br>
                    <label for="شغل">مشغول چه کاری هستی؟</label>
                    <input type="text" class="form-control" name="job" placeholder="مهندس عمران ، بازاری ، برنامه نویس ، دانشجو ..." value="{{ old('job') ?: $user->job }}">
                    <br>
                    <button class="btn btn-success">ذخیره</button>

                </form>
            </div>

        </div>

        <br>

        <div id="sec" class="pane">

            <div class="pane_header">
                <h4 style="font-weight:bold;">اطلاعات فرعی</h4>
                <p style="margin-top:10px;"> این اطلاعات کمک میکند تا دوستان بیشتری پیدا کنید و بیشتر دیده شوید. </p>
                <hr class="solid">
            </div>

            <div class="panel-body">

                <form accept-charset="UTF-8" method="post" action = "/profile/edit/usersec" class="form-horizontal col-md-6 ">

                    {!! csrf_field() !!}

                    @if( session()->get( 'type' )  === "sec")
                        @include('layouts.errors')

                    @endif

                    @if(session()->get( 'status' ) === "success" &&  session()->get( 'type' )  === "sec")
                    <div class="alert alert-success">
                        <strong>موفق!</strong> اطلاعات فرعی شما با موفقیت ذخیره شد
                    </div>
                    @endif

                    <label>یه بیوگرافی از خودت بنویس</label>
                    <textarea class="form-control" name="bio" rows="3">{{ old('bio') ?: $user->bio }}</textarea>
                    <br>
                    <label for="Your_location">کجا زندگی میکنی؟</label>
                    <input type="text" class="form-control" id="Your_location" name="from" placeholder="کرمان ، آمریکا ، کره ماه" value="{{ old('from') ?: $user->from }}">
                    <br>
                    <label for="Your_gender">جنسیت</label>
                    <select id="profile_date_year" name="gender" class="form-control" select="{{ old('gender') ?: $user->gender }}">
                            <option value="" {{ ( $user->gender == null ) ? 'selected' : '' }} >انتخاب جنسیت</option>
                            <option value="1" {{ ( $user->gender == 1 ) ? 'selected' : '' }} >مرد</option>
                            <option value="2" {{ ( $user->gender == 2 ) ? 'selected' : '' }} >زن</option>
                    </select>
                    <br>
                    <button class="btn btn-success">ذخیره</button>

                </form>
            </div>
        </div>
        <br>
        <div id="set"  class="pane">

            <div class="pane_header">
                <h4 style="font-weight:bold;">تنظیمات حساب کاربری</h4>
                <p style="margin-top:10px;">  </p>
                <hr class="solid">
            </div>

            <div class="panel-body">

                <form class="form-horizontal" action="/profile/edit/userset" accept-charset="UTF-8" method="post">
                
                {!! csrf_field() !!}

                    @if( session()->get( 'type' )  === "set")
                        @include('layouts.errors')

                    @endif

                    @if(session()->get( 'status' ) === "success" &&  session()->get( 'type' )  === "set")
                    <div class="alert alert-success">
                        <strong>موفق!</strong> تنظیمات شما با موفقیت ذخیره شد
                    </div>
                    @endif

                    <div class="well checkbox">
                        <label class="checkbox-inline" for="allow_message">
                            <input type="checkbox" name="alow_talk" id="allow_message" value="1" checked>
                            اجازه ارسال و دریافت پیام خصوصی. 
                        </label>
                    </div>
                    <br>
                    <div class="well checkbox">
                        <label class="checkbox-inline" for="disable_profile">
                            <input type="checkbox" name="profile_disable" id="profile_disable" value="1" >
                            پروفایل من رو غیر فعال کن. 
                        </label>
                    </div>
                    <br>

                    <button class="btn btn-success">ذخیره</button>
                </form>
                
            </div>
            
        </div>

    </div>
</div>
<br>
<br>


@endsection

@section('scripts')

<script>

$(window).load(function() { 

    if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname ;
        window.history.pushState({path:newurl},'',newurl);
    }

});
</script>

@endsection