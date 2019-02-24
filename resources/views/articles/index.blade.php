@extends('./layouts/layout')

@section('styles')

<style>
body{
    background-color:white !important;
    
}

.my_container{
    background-color:white !important;
    
}


</style>

@endsection


@section('content')

<br><br>

    <div class="row">

        <div class="col-xs-12 main_panel_col">

            <div class="pane_header">

                <h3 style="font-weight:bold;">مقالات پر بازدید</h3>
                <p style="margin-top:10px;">مقاله هایی که بیشترین بازدید، گفتگو و لایک را داشته باشند در این قسمت قرار میگیرند</p>
                <hr class="solid">

            </div>

            
            <div class="pane">
            <br><br><br><br><br><br><br><br><br>
            </div>

        </div>
    </div>
    <br><br><br>

    <div class="row">

        <div class="col-xs-12 main_panel_col">

            <div class="pane_header">

                <h3 style="font-weight:bold;"> لوپر های فعال این ماه</h3>
                <p style="margin-top:10px;"> این لوپر ها بیشترین فعالیت را در این ماه داشته اند.</p>
                <hr class="solid">

            </div>

            
            <div class="pane">
            <br><br><br><br><br><br><br><br><br>
            </div>

        </div>
        </div>
        <br><br><br>
      

    <div class="row">

        <div class="col-xs-12 main_panel_col">

            <div class="pane_header">

                <h2 style="font-weight:bold;">مقالات اخیر</h2>
                <p style="margin-top:10px; font-size:17px;">در این بخش جدید ترین مقالات ارسالی توسط کاربران نمایش داده میشود </p>
                <hr class="solid">

            </div>

            <div class="pane simple">

                <div class="panel-body main_panel_body">

                    <ul  class="row">

                        @foreach ($articles as $article)

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

                <!-- Pager -->
                <div style="text-align:center;">
                {{ $articles->links() }}

                </div>

            </div>

            <br>
            <br>
            <br>

        </div>

    </div>
       

    

@endsection



