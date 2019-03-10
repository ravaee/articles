
@extends('./layouts/layout')

@section('content')

    

    <!-- Blog Post -->

    <!-- Title -->
    <br>
    <h3 class="article_title_inner">
        {{ $article->title }}

    </h3>
    <br>

    <div>
    <i style=" vertical-align: middle; font-size:20px;" class="fa fa-user-circle-o" aria-hidden="true"> </i> <span>  <b>لوپر:</b> <a class="a" href="index.php">{{$article->user->name}}</a></span>
    &nbsp&nbsp&nbsp&nbsp
    <i style=" vertical-align: middle; font-size:20px;" class="fa fa-clock-o" aria-hidden="true"></i><span>  <b>تاریخ انتشار:</b>   {{Verta::instance($article->created_at)->format('%d  %B  %Y')}}</span>
    &nbsp&nbsp&nbsp&nbsp
    <i style=" vertical-align: middle; font-size:20px;" class="fa fa-list-ul" aria-hidden="true"></i> <b>دسته بندی ها:</b> <span> <a class="a" href="index.php">{{ $article->catText }}</a></span>

    </div>

    <hr class="solid">

    <div class="row">

        <div class="col-md-8">

            <div class="panel-group">
    
                <div class="panel panel-default">
    
                    <div class="panel-body ">

                        {!! $article->body !!}

                        <br/>

                        <hr class="solid"/>

                        <div>
                            <span style="float:right; margin-right:10px;">

                            @if(Auth::check())

                                <i id="like"  data-id="{{$article->id}}" style="color:red; font-size:22px; vertical-align: middle;" class="fa {{$htmlClass}} a like_btn" aria-hidden="true"></i>
                            
                            @else

                                <i id="didentLike"  data-id="{{$article->id}}" style=" font-size:22px; vertical-align: middle;" class="fa fa-heart-o a" aria-hidden="true"></i>
                            
                            @endif
                                <span id="like_count" style="position:relative; margin-right:4px; top:4px; font-size:16px;"> {{$article->like}}</span>
                            </span>

                            <span style="float:right; margin-right:40px;">

                                <i id=""  style=" font-size:22px; vertical-align: middle;" class="fa fa-comment-o" aria-hidden="true"></i>

                                <span  style="position:relative; margin-right:4px; top:4px; font-size:16px;"> {{$comments->count()}}</span>
                            </span>

                            <span style="float:left; margin-left:10px;">

                                <i id=""  style=" font-size:22px; vertical-align: middle;" class="fa fa-eye" aria-hidden="true"></i>

                                <span  style="position:relative; margin-right:4px; top:4px; font-size:16px;"> {{$article->viewCount}}</span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

        </div>

    </div>

    <div class = "row">

    <hr id="hr" class="solid">

        <div class="row">

            <div class="col-sm-10">
                <h3 style="font-weight:bold;">
                    دیدگاه کاربران
                    <br>
                    <p style="color:gray; font-weight:normal; margin-top:10px; font-size:13px; display:inline-block;">دیدگاه شما موجب بهبود عملکرد نویسنده و افزایش کیفیت مقاله میشود.</p>

                </h3>
            </div>

            <div class="col-sm-2">
                @if (Auth::check())
                    <br><br>
                    <button id="open_comment_box" style="color:white !important; width:100%;" class="btn btn-default">ارسال دیدگاه</button>
                @endif
            </div>
            
        </div>

        <br>

        @if (Auth::check())

        <div id="send_comment_box" style="display:none;" class="well">

            @if (isset($_GET['come'])) 
                @if ($_GET['come'] == "comment")
                    @include('./layouts/errors')
                @endif
            @endif

            <h4>ارسال نظر :</h4>
            <form role="form" action= "{{ route('comment.store' , ['article' => $article->id]) }}" method = "post">
                {!! csrf_field() !!}
                <br>
                <!-- <br> -->
                <div class="form-group">
                    <!-- <label> متن: </label> -->
                    <textarea class="form-control" placeholder = "متن خود را وارد کنید" name = "body"  rows="3"></textarea>
                    
                </div>

                <button type="submit" class="btn btn-success">ارسال</button>
            </form>
        </div>

        @else

        <div class="well">
            @include('./layouts/errors')
            <h4>برای ارسال نظر <a> وارد شوید </a></h4>
        </div>
        @endif

        <br>

        @php ($counter = 0)

        @foreach($comments as $comment)
        @php ($counter += 1)

        @if($comment->approved != 0)

        <div id="pd{{$comment->id}}" class="panel-group">
    
            <div class="panel panel-default">

                <div class="panel-body ">

                    <div class="media">
                        <div class="media-body">
                            <br>

                            <div class="media-heading">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div style="display:inline-block">
                                            <img class="comment_avatar" src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar">
                                        </div>
                                        <div style="display:inline-block; margin-right:10px; height:70px;">
                                            <span style="display:block;" class="comment_for"><a class="a">{{$comment->user->name}}</a></span>
                                            <span  style="display:block;" class="comment_date">ارسال شده در تاریخ {{Verta::instance($comment->created_at)->format('%d  %B  %Y')}}</span>
                                        </div>                 
                                    </div>
                                    <div class="col-sm-2">
                                        @if (Auth::check())
                                            <br>
                                            <button id="p{{$comment->id}}" data-id="{{$comment->id}}" style="color:white !important; width:100%;" class="btn btn-warning open_answer_box">ارسال پاسخ</button>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <p class = "comment-body">
                                {{ $comment->body }}
                            </p>

                            <br>
                            <br>

                            <div id="pb{{$comment->id}}" style="display:none;" class="well send_answer_box">

                            
                                @if (isset($_GET['box'])) 
                                    @if ($_GET['box'] == "pb". $comment->id)
                                        @include('./layouts/errors')
                                    @endif
                                @endif
                            
                                <h4>ارسال پاسخ :</h4>
                                <form role="form" action= "{{ route('comment.addAnswer' , ['comment' => $comment->id ]) }}" method = "post">
                                    {!! csrf_field() !!}
                                    <br>
                                    <!-- <br> -->
                                    <div class="form-group">
                                        <!-- <label> متن: </label> -->
                                        <textarea class="form-control" placeholder = "متن خود را وارد کنید" name = "answer"  rows="3"></textarea>
                                        
                                    </div>

                                    <button type="submit" class="btn btn-success">ارسال پاسخ</button>
                                </form>
                                <br>
                                <br>
                            </div>

                            @foreach($comment->answers as $answer)

                                @if($answer->approved)

                                <div class="media-heading" style="background-color:whitesmoke; padding:10px;">
                                    <div style="display:inline-block">
                                        <img class="answer_avatar" src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar">
                                    </div>
                                    <div style="display:inline-block; margin-right:10px; height:50px;">
                                        <span style="display:block;" class="answer_for"><a class="a">{{$comment->user->name}}</a></span>
                                        <span  style="display:block;" class="answer_date">ارسال شده در تاریخ {{Verta::instance($comment->created_at)->format('%d  %B  %Y')}}</span>
                                    </div>  

                                    <br>
                                    <p class = "answer-body">
                                        {{ $answer->answer }}
                                    </p>
                                </div>


                                @endif
                                <br>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif    

        @endforeach

        @if ($counter === 0)
            <p>نظری موجود نمیباشد</p>
        @endif




    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
 
            <div id="show_albums" class="modal-content" style="display:block;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h5 class="modal-title" id="myModalLabel">لوپین میگه:</h5>
                </div>

                <div class="modal-body">
                    <div id="bdy" class="row">
                    	<div id="success_msg" class="alert alert-success" style="display:none; color:green;">
                         	دیدگاه شما ارسال شد، پس از تایید نمایش داده میشود.
                    	</div>

                    	<div id="fail_msg" class="alert alert-danger" style="display:none; color:red;">
                         	ورودی های خود را بررسی کنید.
                    	</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button style="float:right;" type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>


        </div>
    </div>
</div>
  

@endsection

@section('scripts')

<script>


$(document).on('click', '.like_btn', function () {

    var id = $(this).data('id');

    var jqxhr = $.get( "/article/like?id="+id + "&" + "command=like", function(data) {
        
    });

    jqxhr.done(function(data) {

        if(data.comment == "like"){

            $( "#like" ).removeClass( "fa-heart-o" ).addClass( "fa-heart" );
        }else{
            $( "#like" ).removeClass( "fa-heart" ).addClass( "fa-heart-o" );
        }

        $("#like_count").html(data.like_count);
    });

    jqxhr.fail(function(data) {
    
    });

    jqxhr.always(function(data) {
    
    });

});

$(document).on('click', '#open_comment_box', function () {

    if($('#send_comment_box').is(':visible'))
    {
        $( "#send_comment_box" ).hide( "slow", function() {
            
        });

    }else{
        $( "#send_comment_box" ).show( "slow", function() {
            
        });
    }

});

$(document).on('click', '.open_answer_box', function () {

    var id = $(this).data('id');

    if($('#pb'+id).is(':visible'))
    {
        $( '#pb'+id ).hide( "fast", function() {
            
        });

    }else{
        $( '#pb'+id  ).show( "fast", function() {
            
        });
    }

});


$(window).load(function() {  

    if(getQueryVariable("come") == 'comment'){

        if(getQueryVariable("status") == 'error'){

            $('#myModal').modal('hide');

            $( "#send_comment_box" ).show();

        }else if(getQueryVariable("status") == 'ok'){

            $('#myModal').modal('show');

            $( "#success_msg" ).show();
            $( "#fail_msg" ).hide();

        }else{

            $('#myModal').modal('hide');
        }


    }else if(getQueryVariable("come") == 'answer'){

        if(getQueryVariable("status") == 'error'){

            $('#myModal').modal('hide');

            $( "#"+getQueryVariable("box") ).show( "fast", function() {
                
            });

            if (history.pushState) {
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname ;
                window.history.pushState({path:newurl},'',newurl);
            }

        }else if(getQueryVariable("status") == 'ok'){

            $('#myModal').modal('show');
            
            $( "#success_msg" ).show();
            $( "#fail_msg" ).hide();

            if (history.pushState) {
                var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname ;
                window.history.pushState({path:newurl},'',newurl);
            }

        }else{

            $('#myModal').modal('hide');


        }


    }

});


function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
    }
    return(false);
}






</script>


@endsection


