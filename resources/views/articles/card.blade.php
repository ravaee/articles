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

                <p>{{ $article->catText }}</p>

            </div>

        </div>

    </div>
</li>