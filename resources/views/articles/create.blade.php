@extends('./layouts/layout')

@section('styles')
<link href="/css/album_editor.css" rel="stylesheet">
@endsection

@section('content')

    <h1 class="page-header">
        ارسال مقاله
    </h1>

    <br/>

    @include('./layouts/errors')


<form name="compForm" action="{{  route('article.store') }} ", method="POST" , enctype="multipart/form-data">

    <div class="row">

        <div class="col-md-7 col-lg-8">
           
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" name="title" class="form-control" value="{!! old('title') !!}" id="title" aria-describedby="emailHelp" placeholder="عنوان را وارد کنید">
                <small id="emailHelp" class="form-text text-muted">تاپیک در رسانایی موضوع اهمییت بالایی دارد.</small>
            </div>

            <br>

            <div class="form-group">

                <div id="toolBar1" class="row" style="margin-bottom:10px;">

                    <div class = "col-xs-4">
                        <select class="form-control" onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;">
                            <option selected>- انتخاب تیترواره -</option>
                            <option value="h1"> 1 &lt;h1&gt;</option>
                            <option value="h2"> 2 &lt;h2&gt;</option>
                            <option value="h3"> 3 &lt;h3&gt;</option>
                            <option value="h4"> 4 &lt;h4&gt;</option>
                            <option value="h5"> 5 &lt;h5&gt;</option>
                            <option value="h6"> 6 &lt;h6&gt;</option>
                            <option value="p">پاراگراف &lt;p&gt;</option>
                            <option value="pre">پری فرمت &lt;pre&gt;</option>
                        </select>
                    </div>
                    <div class = "col-xs-4">
                        <select class="form-control" onchange="formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;">
                            <option class="heading" selected>- اندازه متن -</option>
                            <option value="1">کوچولو</option>
                            <option value="2">کوچک</option>
                            <option value="3">متوسط</option>
                            <option value="4">بزرگ</option>
                            <option value="5">هیولا</option>
                            <option value="6">هرکول</option>
                            <option value="7">باس آخر</option>
                        </select>
                    </div>
                    <div class = "col-xs-4">
                        <select class="form-control" onchange="formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;">
                            <option class="heading" selected>- رنگ متن -</option>
                            <option value="red">قرمز</option>
                            <option value="blue">آبی</option>
                            <option value="green">سبز</option>
                            <option value="black">مشکی</option>
                        </select>
                    </div>
                </div>

                <div id="toolBar2" class="row">

                    <div class="col-xs-1">
                        <img class="intLink" title="بدون افکت" onclick="formatDoc('removeFormat')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABGdBTUEAALGPC/xhBQAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB9oECQMCKPI8CIIAAAAIdEVYdENvbW1lbnQA9syWvwAAAuhJREFUOMtjYBgFxAB501ZWBvVaL2nHnlmk6mXCJbF69zU+Hz/9fB5O1lx+bg45qhl8/fYr5it3XrP/YWTUvvvk3VeqGXz70TvbJy8+Wv39+2/Hz19/mGwjZzuTYjALuoBv9jImaXHeyD3H7kU8fPj2ICML8z92dlbtMzdeiG3fco7J08foH1kurkm3E9iw54YvKwuTuom+LPt/BgbWf3//sf37/1/c02cCG1lB8f//f95DZx74MTMzshhoSm6szrQ/a6Ir/Z2RkfEjBxuLYFpDiDi6Af///2ckaHBp7+7wmavP5n76+P2ClrLIYl8H9W36auJCbCxM4szMTJac7Kza////R3H1w2cfWAgafPbqs5g7D95++/P1B4+ECK8tAwMDw/1H7159+/7r7ZcvPz4fOHbzEwMDwx8GBgaGnNatfHZx8zqrJ+4VJBh5CQEGOySEua/v3n7hXmqI8WUGBgYGL3vVG7fuPK3i5GD9/fja7ZsMDAzMG/Ze52mZeSj4yu1XEq/ff7W5dvfVAS1lsXc4Db7z8C3r8p7Qjf///2dnZGxlqJuyr3rPqQd/Hhyu7oSpYWScylDQsd3kzvnH738wMDzj5GBN1VIWW4c3KDon7VOvm7S3paB9u5qsU5/x5KUnlY+eexQbkLNsErK61+++VnAJcfkyMTIwffj0QwZbJDKjcETs1Y8evyd48toz8y/ffzv//vPP4veffxpX77z6l5JewHPu8MqTDAwMDLzyrjb/mZm0JcT5Lj+89+Ybm6zz95oMh7s4XbygN3Sluq4Mj5K8iKMgP4f0////fv77//8nLy+7MCcXmyYDAwODS9jM9tcvPypd35pne3ljdjvj26+H2dhYpuENikgfvQeXNmSl3tqepxXsqhXPyc666s+fv1fMdKR3TK72zpix8nTc7bdfhfkEeVbC9KhbK/9iYWHiErbu6MWbY/7//8/4//9/pgOnH6jGVazvFDRtq2VgiBIZrUTIBgCk+ivHvuEKwAAAAABJRU5ErkJggg==">
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="بدون تگ" onclick="getPlainText()" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABGdBTUEAALGPC/xhBQAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB9oECQMCKPI8CIIAAAAIdEVYdENvbW1lbnQA9syWvwAAAuhJREFUOMtjYBgFxAB501ZWBvVaL2nHnlmk6mXCJbF69zU+Hz/9fB5O1lx+bg45qhl8/fYr5it3XrP/YWTUvvvk3VeqGXz70TvbJy8+Wv39+2/Hz19/mGwjZzuTYjALuoBv9jImaXHeyD3H7kU8fPj2ICML8z92dlbtMzdeiG3fco7J08foH1kurkm3E9iw54YvKwuTuom+LPt/BgbWf3//sf37/1/c02cCG1lB8f//f95DZx74MTMzshhoSm6szrQ/a6Ir/Z2RkfEjBxuLYFpDiDi6Af///2ckaHBp7+7wmavP5n76+P2ClrLIYl8H9W36auJCbCxM4szMTJac7Kza////R3H1w2cfWAgafPbqs5g7D95++/P1B4+ECK8tAwMDw/1H7159+/7r7ZcvPz4fOHbzEwMDwx8GBgaGnNatfHZx8zqrJ+4VJBh5CQEGOySEua/v3n7hXmqI8WUGBgYGL3vVG7fuPK3i5GD9/fja7ZsMDAzMG/Ze52mZeSj4yu1XEq/ff7W5dvfVAS1lsXc4Db7z8C3r8p7Qjf///2dnZGxlqJuyr3rPqQd/Hhyu7oSpYWScylDQsd3kzvnH738wMDzj5GBN1VIWW4c3KDon7VOvm7S3paB9u5qsU5/x5KUnlY+eexQbkLNsErK61+++VnAJcfkyMTIwffj0QwZbJDKjcETs1Y8evyd48toz8y/ffzv//vPP4veffxpX77z6l5JewHPu8MqTDAwMDLzyrjb/mZm0JcT5Lj+89+Ybm6zz95oMh7s4XbygN3Sluq4Mj5K8iKMgP4f0////fv77//8nLy+7MCcXmyYDAwODS9jM9tcvPypd35pne3ljdjvj26+H2dhYpuENikgfvQeXNmSl3tqepxXsqhXPyc666s+fv1fMdKR3TK72zpix8nTc7bdfhfkEeVbC9KhbK/9iYWHiErbu6MWbY/7//8/4//9/pgOnH6jGVazvFDRtq2VgiBIZrUTIBgCk+ivHvuEKwAAAAABJRU5ErkJggg==">
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="زخیم" onclick="formatDoc('bold');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAInhI+pa+H9mJy0LhdgtrxzDG5WGFVk6aXqyk6Y9kXvKKNuLbb6zgMFADs=" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="ایتالیک" onclick="formatDoc('italic');" src="data:image/gif;base64,R0lGODlhFgAWAKEDAAAAAF9vj5WIbf///yH5BAEAAAMALAAAAAAWABYAAAIjnI+py+0Po5x0gXvruEKHrF2BB1YiCWgbMFIYpsbyTNd2UwAAOw==" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="زیر خط" onclick="formatDoc('underline');" src="data:image/gif;base64,R0lGODlhFgAWAKECAAAAAF9vj////////yH5BAEAAAIALAAAAAAWABYAAAIrlI+py+0Po5zUgAsEzvEeL4Ea15EiJJ5PSqJmuwKBEKgxVuXWtun+DwxCCgA7" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="از چپ" onclick="formatDoc('justifyleft');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JMGELkGYxo+qzl4nKyXAAAOw==" />
                    </div>
                    
                    <div class="col-xs-1">
                        <img class="intLink" title="وسط" onclick="formatDoc('justifycenter');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIfhI+py+0Po5y02ouz3jL4D4JOGI7kaZ5Bqn4sycVbAQA7" />
                    </div>
                    
                    <div class="col-xs-1">
                        <img class="intLink" title="جاستیفای راست" onclick="formatDoc('justifyright','j');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JQGDLkGYxouqzl43JyVgAAOw==" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="لیست عددی" onclick="formatDoc('insertorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAADljwliE35GjuaezxtHa7P///////yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKSespwjoRFvggCBUBoTFBeq6QIAysQnRHaEOzyaZ07Lu9lUBnC0UGQU1K52s6n5oEADs=" />
                    </div>
                    
                    <div class="col-xs-1">
                        <img class="intLink" title="لیست نقطه" onclick="formatDoc('insertunorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAAB1ChF9vj1iE33mOrqezxv///////yH5BAEAAAcALAAAAAAWABYAAAMyeLrc/jDKSesppNhGRlBAKIZRERBbqm6YtnbfMY7lud64UwiuKnigGQliQuWOyKQykgAAOw==" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="لینک" onclick="var sLnk=prompt('مسیر لینک','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){formatDoc('createlink',sLnk)}" src="data:image/gif;base64,R0lGODlhFgAWAOMKAB1ChDRLY19vj3mOrpGjuaezxrCztb/I19Ha7Pv8/f///////////////////////yH5BAEKAA8ALAAAAAAWABYAAARY8MlJq7046827/2BYIQVhHg9pEgVGIklyDEUBy/RlE4FQF4dCj2AQXAiJQDCWQCAEBwIioEMQBgSAFhDAGghGi9XgHAhMNoSZgJkJei33UESv2+/4vD4TAQA7" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="تصویر فول" onclick="var sLnk=prompt('مسیر تصویر','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){makeImageFull(sLnk)}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAACD0lEQVRIibXVvWsUURTG4edchhBCEJEgIlYZkJRiZSV+I4IflaWVIAhiIWghImJhIRYiFjaKoDb+A1YqVmJlIWKzFhYiQTSIiASZa7E7cjPOGlPsaXZmuft7z3vuOWcjyyYZaaJ0VO1DHanKpEBG+WmV7zrxa5Cbpn2J+Yh1OIcDxjjqgtqiduGjc59xZZCbV63Akcyd4BG+/ttwv3ghlrAf33F4kJtfFTYEy5lrwRK2ZjYF7/BpNYGeEjU4ihl8q4oMGhzMXA824SVODXLzYS2O6kgrSpo6WZzBAtZjHw6NgczUkXbVkVbtwtSxuFi8LxuWrAufzVzDY1yuI812z5TMhHLUbuBpHnbCXTzpwNfhEk5n5jLncaGONF2eK0e3KhUHuXmNvX/5HMLnRgmcKOZheiSyuY50ZpCbH10H1d+oP0O3E4vvc/NmPtLG4BaOdWcimMqcwPJ8pIvdruqWqI09wf3gXh1pR3ATxzNTLaAzzRVOBtt6S1TG/BD4EHPYknkWTLXQvpVRsLpdufIO6kgLuD2Ct5lOl1l1HfQM2oro9vH2YHsJzP3Z/veSr9rDI8BS5m2MyXDcc+HuR69AsahexHCPrCmKC/9o2CArBJYML/GsNW7TnpZN2I0v+AlV5nnwwHDvpHE/7gP3dFUzSvjqIDfLEFlWR0qZmSD9C/yfjn628D8Ck4yJ/+lPXOA3O4uXGZmYIcMAAAAASUVORK5CYII=" />
                    </div>

                    <div class="col-xs-1">
                        <img class="intLink" title="تصویر وسط" onclick="var sLnk=prompt('مسیر تصویر','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){makeImageHalf(sLnk)}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAACQ0lEQVRIibWWPWgUURSFv/NYFlmWJQQJQSTIDEgQC0lhFVJbiU0I/hAsBFshBrGwSiEiViGiraJ2YiGCrTYhjWIhIhkRUYidLGEJW7xrMTP69mVmdxW9U82be8+55/4MT4ZRWirXBA4w2jzQy8z7UY4qCVK5o8ANYDp2KlPQ4PE2sJ6Zfz8uwQXgPvAc2AvBI+Ap4JTBtqAJLAFbtWqseBJpOZG+J9JBo/5JpPlEskQ6k0ivE+lNIs3V+bth8oaZwVvgPNAHHqZyJ1O5fXh/TSAgM/8FuAz0yMt75J8RGEykchPAZ4MVoAOsxioaUVDc0CrrW57xI4phUI4zCRwnH/NeJUEJXuzDgsGs4F1m/lXg9gFYEaQR8QJ5RQYwG1SYwWnBBjBpsJPILX4yvwmQme8C9+KYRO6WYD4+r+vBWWBK0BAcFizW+P0y8XshaxWUPRDsBMce+Fa+pHJtYJa8dP2YZKSCIot14AXwFXgGPCjAmwbXDV4aLBe9imPrFQRZfCRfojbQzcx3U7kOcE1wBWgBt4F2Knc3M9+vm8ABBaVDZt5n5n8Ahwx6qVwLWAWuGrSKTCeANeBirGSoAoBUrgGcA9YEd8hH8hL5zy20dqFkcyyCQOaJIrsZ4GYB3KgpQ6cu0X0EQfAxYKYoRSsGHXPjgfo9cCVh1XxXgY+1B4E9Bp7GgCVIBcGuwVIVSUjgyZu2YbBXgoQBI0o1B3SV41QSbBVZT4dAw2odfdsBnmTmdwd8/vRWEWYdKai8aQwQ/A/7CeZFyBqPeKyBAAAAAElFTkSuQmCC" />
                    </div>

                </div>

                <div id="editor" class="form-control" contenteditable="true">{!! old('body') !!}</div>
                <p id="editMode" class="form-control"><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">دریافت کد</label></p>

            </div>

            <input type="hidden" id="txtarea" name="body">

            <button type="submit" onclick="getContent()" class="btn btn-primary">ارسال مقاله</button>

            <br>
            <br>
        
        </div>

        <div class="col-md-5 col-lg-4">


                <!-- categori -->

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">سبک مقالتون چیه؟</div>
                        <div class="panel-body my_group">
                            <div class="row">

                                @php
                                    

                                    $len = count($cats);

                                    $firsthalf = $cats->slice(0, $len / 2);
                                    $secondhalf = $cats->slice($len / 2, $len);
                                @endphp

                                <div class="col-sm-6 col-xs-6">
                                    <ul class="list-unstyled">
                                   
                                    @foreach($firsthalf as $fieldName => $cat)
                                        <li><input type="checkbox" name="categories[]" value="{{$cat->id}}"> <label>{{$cat->name}}</label></li>
                                    @endforeach
                                    </ul>
                                </div>

                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                    @foreach($secondhalf as $fieldName => $cat)
                                    <li><input type="checkbox" name="categories[]" value="{{$cat->id}}"> <label>{{$cat->name}}</label></li>
                                    @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- picture -->

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">انتخاب تصویر</div>
                        <div class="panel-body" >
                            <div class="row">

                                <div class="form-group my_group">
                                    <div style="width:100%;" class="main-img-preview">
                                        <img style="width:50%; float: none; margin: 0 auto;" class="thumbnail img-preview" src="http://localhost:8000/images/site/up.png" title="تصویر پوشش مقاله">
                                        <br>
                                    </div>
                                    <div class="input-group">
                                        <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="مسیر تصویر پوششی مقاله " disabled="disabled">
                                        <div class="input-group-btn">
                                        <div class="fileUpload btn btn-danger fake-shadow">
                                            <span><i class="glyphicon glyphicon-upload"></i> مسیر دهی</span>
                                            <input id="logo-id" name="file" type="file" class="attachment_upload">
                                        </div>
                                        </div>
                                    </div>
                                    <p class="help-block">توجه : نسبت تصویر 1:1 می باشد .</p>
                                    <p class="help-block">توجه: حداکثر سایز عکس میبایستی 1 مگابایت باشد</p>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>


                <!-- cover_text -->


                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">متن پوششی</div>
                        <div class="panel-body" >
                            <div class="row">

                                <div class="form-group my_group">
                                    <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" name="cover_text" class="form-control" id="body" placeholder="متن پوششی را وارد کنید">{{{ old('cover_text') }}}</textarea>
                                    <small class="form-text text-muted">متن پوششی قسمتی مهم و جذاب از متن اصلی میباشد که کاربر را به خواندن مقاله شما ترغیب میکند.</small>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</form>


<a class="float a" href="#" id="menu-share">
<i class="glyphicon glyphicon-cog my-float"></i>
</a>
<ul class="ul">
<li class="inner_li "><a id="h_adder" class="inner_f_a a" href="#">
<i class="fa fa-header my-float_sub"></i>
</a></li>
<li class="inner_li"><a id="img_adder" data-toggle="modal" data-target="#myModal" class="inner_f_a a" href="#">
<i class="fa fa-picture-o my-float_sub"></i>
</a></li>
<li class="inner_li"><a id="b_adder" class="inner_f_a a" href="#">
<i class="fa fa-bold my-float_sub"></i>
</a></li>
<li class="inner_li"><a id="code_adder" class="inner_f_a a" href="#">
<i class="fa fa-code my-float_sub"></i>
</a></li>
</ul>


<!-- album page -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
 
            <div id="show_albums" class="modal-content" style="display:block;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h3 class="modal-title" id="myModalLabel">آلبوم های شما</h3>
                     <a id="create_an_album" type="button" style="cursor:pointer; margin-top:10px; " class="a">+ ایجاد آلبوم جدید </a>

                     <div id="album-success" class="alert alert-success" style="display:none;">
                         آلبوم جدید افزوده شد.
                    </div>

                </div>

                <div class="modal-body">
                    <div id="albums_col" class="row">
                        
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>


            <div id="show_pictures"  class="modal-content" style="display:none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h3 class="modal-title" id="myModalLabel">تصاویر آلبوم</h3>
                     <a id="add_picture" type="button" style="cursor:pointer; margin-top:10px; " class="a">+ ایجاد تصویر جدید </a>
                </div>

                <div class="modal-body">
                    <div id="pictures_col" class="row">
                            
                    </div>
                </div>

                <div class="modal-footer">            
                    <button id="show_alb2" type="button" class="btn btn-default">بازگشت به لیست آلبوم ها</button>
                </div>
            </div>


            <div id="create_album" class="modal-content" style="display:none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="myModalLabel">ایجاد آلبوم جدید</h4>

                </div>

                <div  class="modal-body">

                    <div class="row">

                        <form  id="new_album" >

                            <div class="form-group">
                                <label >نام آلبوم:</label>
                                <input id="name" name="name" class="form-control" placeholder="نام آلبوم را وارد کنید"/>
                                <small class="form-text text-muted">بین 5 الی 15 حرف</small>
                            </div>
                            <button id="create_new_album" type="submit" class="btn btn-success">ایجاد</button>

                        </form>

                    </div>
                </div>

                <div class="modal-footer">
                    <button id="show_alb" type="button" class="btn btn-default">بازگشت به لیست آلبوم ها</button>
                </div>
            </div>



            <div id="create_picture" class="modal-content" style="display:none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h3 class="modal-title" id="myModalLabel">ایجاد تصویر جدید</h3>

                     <p class="help-block">توجه : نسبت تصویر 1:1 می باشد .</p>
                     <p class="help-block">توجه: حداکثر سایز عکس میبایستی 1 مگابایت باشد</p>

                </div>

                <div  class="modal-body">
                    <div class="row">

                        <div  class="form-group my_group">

                            <div style="width:50%; margin-top:10px;" class="main-img-preview">

                                <img id="priv" class="thumbnail img-preview" src="http://localhost:8000/images/site/up.png" title="تصویر نمایشی">
                            </div>

                            <form id="img_upload_form">

                                <div class="input-group">

                                    <input id="fakeUploadLogo2" class="form-control fake-shadow" placeholder="مسیر تصویر را وارد کتید" disabled="disabled">

                                    <div class="input-group-btn">
                                        <div class="fileUpload btn btn-danger fake-shadow">
                                            <span><i class="glyphicon glyphicon-upload"></i> مسیر دهی</span>
                                            <input id="logo-id2" name="file" type="file" class="attachment_upload">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <input name="name" style="width:100%;" class="form-control" placeholder="نام تصویر را وارد کنید">
                                <br>
                                
                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="upload_new_picture" class="btn btn-success"> آپلود تصویر </button>
                    <button id="back_to_album_picture" type="button" class="btn btn-default" >برگشت</button>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')

    <script src="/js/editor.js"></script>
    <script src="/js/album.js"></script>

@endsection
