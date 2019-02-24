@extends('./layouts/layout')

@section('styles')

@endsection

@section('content')

    <br>    
    <div class="row">

        <div class="col-lg-10 col-md-8 col-sm-6 col-xs-12">

            <h3 class="article_title_inner">
             پروفایل کاربری : <a class="a" href="{{ route('user.show' ,$user->name) }}">{{ $user->name}} </a>

            </h3>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <br>
            @if( Auth::user() == $user)
                    <span class="edit_span"> <i class="fa fa-pencil-square" style="font-size:20px" aria-hidden="true"></i> &nbsp <a href="/profile/edit" class="a">ویرایش اطلاعات</a> </span>
            @endif
        </div>
    </div>

    <hr class="solid">

    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">

        @include('components.profileSidebar')
        <br>
        <br>
    </div>

    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

        <div class="pane">

            <div class="pane_header">
                <h4 style="font-weight:bold;">من کیم؟</h4>
                <hr class="solid">
            </div>

            <div class="panel-body ">

                <div class="col-md-6 ">

                    <label class="info_text"> نام: </label>
                    <label class="info_answer"> {{$user->firstname}} </label>
                    <br>
                    <br>
                    <label class="info_text"> نام خانوادگی: </label>
                    <label class="info_answer"> {{$user->lastname}} </label>
                    <br><br>
                    <label class="info_text"> علاقه مند به: </label>
                    <label class="info_answer"> {{$user->likes}} </label>
                    <br><br>
                    <label class="info_text"> شغل: </label>
                    <label class="info_answer"> {{$user->job}} </label>
                    <br><br>
                    <label class="info_text"> محل سکونت: </label>
                    <label class="info_answer"> {{$user->from}} </label>

                </div>

                <br class="visible-sm visible-xs">
                <br class="visible-sm visible-xs">

                <div class="col-md-6 ">

                    <label class="info_text"> بیوگرافی: </label>
                    <p class="info_answer">{{$user->bio}}</p>

                </div>
            </div>
        </div>

        <br><br>


        <div class="pane">

            <div class="pane_header">
                <h4 style="font-weight:bold;">مقالات اخیر</h4>
                <hr class="solid">
            </div>

            <div class="pane simple">

                <div class="panel-body main_panel_body">

                    <ul  class="row">

                        @foreach ($user->articles as $article)

                            <li class="col-lg-3 col-md-4 col-sm-6 card_col">

                                <div style="padding-top:0;" class = "card pane active_pane">

                                
                                    <div class="card_img img-responsive img-thumbnail ratio-4-3" style="background-image:url('/images/articles_header_image/{{$article->image}}')">
                                
                                    <a href="{{ route('article.show' , ['article' => $article->id ]) }}"></a>
                                    <footer class="image_footer">
                                        <div class="image_footer_like"> <div class="like_counter"> {{$article->like}}</div> &nbsp <i style= "font-size:16px; margin-top:4px;" class="fa fa-heart-o" aria-hidden="true"></i>   </div>        
                                        <div class="image_footer_auth"><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp <a href="#" class="a auth_name"> محمد روایی </a> </div>
                                                
                                    </footer>
                                    </div>

                                    <div class="card_container">

                                        <div class="card_container_text_part">

                                            <h4><b><a class="a post_title" href="{{ route('article.show' , ['article' => $article->id ]) }}">{{$article->title}}</a></b></h4> 

                                            <p class="post_cover" style="margin-top:0px;">
                                                {{ str_limit(preg_replace( "/\r|\n/", "", $article->cover_text ) , 100) }}
                                            </p>

                                        </div>
                                    
                                    </div>

                                </div>
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

        <!-- <div class="pane">

            <div class="pane_header">
                <h4 style="font-weight:bold;">فعالیت های اخیر</h4>
                <hr class="solid">
            </div>

            <div class="col">

                <div class="activity_panel">

                    <div class="activity_panel_shape_box">
                        <i class="fa fa-heart shape_box_shape" aria-hidden="true"></i>
                    </div>

                    <small class="activity_panel_text"> امید پرعباس این مقاله را پسندید. </small>
                
                </div>
            </div>

        </div> -->

        <br>
        <br>
        <br>
        <br>
        
    </div>



@endsection

@section('scripts')
