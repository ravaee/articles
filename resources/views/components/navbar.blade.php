
<div id="desktop_banner" >
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                
                <h1 class="title"><a class="a" href="/"> لوپین </a></h1>
                <h4  class="sub_title"> <a class="a" href="/">  دنیای فانتزیتو اینجا به اشتراک بزار </a></h4>
            </div>

            <div class="col-sm-4 serach_box" >
                <form action="/hms/accommodations" method="GET"> 

                        <input type="text" class="form-control" placeholder="جستجو بین مقالات" id="txt_search"/>

                        <button  type="submit" id="search_btn">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                </form>
            </div>

            <div class="col-sm-4">

            @if(Auth::check())
            
            <div class="dropdown" style="z-index:1010; float:left;">

                <button class="dropdown-toggle" data-toggle="dropdown" type="button" id="logedin_btn">
                <span style="margin-bottom: 2px;" class="glyphicon glyphicon-user"></span> خوش آمدید  <p style = " display:inline-block; font-weight:bold;">  {{Auth::user()->name}} </p> <span style="margin-top: 3px;" class="caret"></span> 
                </button>
                <ul class="dropdown-menu">
                    <li class="dropdown-header"><span class="glyphicon glyphicon-wrench"></span> ابزار </li>
                    <li><a href="/article/create">ارسال مقاله</a></li>
                    <li><a href="{{ route('user.show' , ['username' => Auth::user()->name ]) }}">صفحه شخصی</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header"><span class="glyphicon glyphicon-user"></span>  حساب کاربری  </li>
                    <li>
                        <form action="{{route('logout') }}" method="post">
                            {!! csrf_field() !!}

                            <button class="a_button">خروج از حساب کاربری</button>
                        </form>
                    </li>
                </ul>
            </div>

            @else

                <div class="login">
                    <span id="login_icon" class="glyphicon glyphicon-user"></span> <span > <a id="login" href="/login">ورود </a></span>  <span ><a id="register" href="/register">عضویت </a></span>
                </div>

            @endif
                
            </div>

        </div>
    </div>
</div>


<nav id="banner" class="navbar navbar-default"  role="navigation">
    <div class="container">

        <div class="navbar-header">

            <div style="display:inline-block">
                <h1 class="title">لوپین</h1>
                <h4  class="sub_title">سیستم اشتراک گزاری مقاله های فارسی</h4>
            </div>


            <!-- <button id="nav_btn" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                
                
            </button> -->
            
            <h1 id="nav_btn"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                <span style="margin-top:10px;" class="glyphicon glyphicon-menu-hamburger"></span> 
            </h1>

        </div>

            
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li>
                    <div class="serach_box_inner" >
                        <form action="/hms/accommodations" method="GET"> 

                                <input type="text" class="form-control" placeholder="جستجو بین مقالات" id="txt_search"/>

                                <button  type="submit" id="search_btn">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                        </form>
                    </div>
                </li>

                @foreach($cats as $fieldName => $cat)
                    {{-- $fieldName will help to determine the icons: facebook/google --}} 
                    <li><a href="/">{{ $cat->name }}</a></li>
                @endforeach
                


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

    
<!-- Navigation -->
<nav id="topnavbar" class="navbar navbar-default navbar-static-top me_navbar "  role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand navbar-right" href="/">مقالات</a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>

            
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach($cats as $fieldName => $cat)
                    {{-- $fieldName will help to determine the icons: facebook/google --}} 
                    <li><a href="/">{{ $cat->name }}</a></li>
                @endforeach
                <li><a href="/article/create">ایجاد مقابه</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
