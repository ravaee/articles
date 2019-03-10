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
                            @include("articles.card", ["article" => $article])
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



