var albumId = 0;

function showAlbums(){

    document.getElementById("create_album").style.display = "none";
    document.getElementById("show_albums").style.display = "block";
    document.getElementById("show_pictures").style.display = "none";
    document.getElementById("create_picture").style.display = "none";
}

function showCreateAlbum(){

    document.getElementById("create_album").style.display = "block";
    document.getElementById("show_albums").style.display = "none";
    document.getElementById("show_pictures").style.display = "none";
    document.getElementById("create_picture").style.display = "none";
}

function showCreatePicture(){

    document.getElementById("create_album").style.display = "none";
    document.getElementById("show_albums").style.display = "none";
    document.getElementById("show_pictures").style.display = "none";
    document.getElementById("create_picture").style.display = "block";
}

function showAlbumPictures(){

    document.getElementById("create_album").style.display = "none";
    document.getElementById("show_albums").style.display = "none";
    document.getElementById("show_pictures").style.display = "block";
    document.getElementById("create_picture").style.display = "none";
}




//initializing 
function initAlbums(albumArray){
    $("#albums_col").html("");
    $(function() {
        
        $.each(albumArray.data, function(i, item) {
            $("#albums_col").append("<div data-id='"+ item.id +"' class = 'col-sm-2 text-center album_block' >"
            +
            "<span style='font-size:40px; text-align:center;'><i style='text-align:center;' class='fa fa-file-image-o'  aria-hidden='true'></i></span>"
            +
            "<div style='width:100%; text-align:center;'>"
            +
            "<span  style=' overflow:hidden; text-align:center; height:25px; width:100%;'><p  display:inline-block;'>"+ item.name  +"</p>"+"</span>"
            +
            "<span style=' text-align:center; width:100%;'><i data-id='"+ item.id +"' class='fa fa-trash a album_delete_btn' aria-hidden='true'></i></span>"
            +
            "</div>"
            +
            "</div>");
        });
    });
}

function initPictures(PictureArray){

    $("#pictures_col").html("");
    $(function() {
        
        $.each(PictureArray.data, function(i, item) {
            $("#pictures_col").append("<div id='"+ item.id +"' class = 'col-sm-3 text-center picture_block'>"
            +
            "<div style=' text-align:center; background-image:url("+ item.url +"); ' class='card_img img-responsive img-thumbnail ratio-4-3'></div>"
            +
            "<div style='width:100%;'>"
            +
            "<span  style='float:right; overflow:hidden; text-align:right; height:25px; width:50%;'><p  display:inline-block;'>"+ item.name  +"</p>"+"</span>"
            +
            "<span style='float:left; text-align:left; width:50%;'><i data-name='"+ item.name +"' class='fa fa-trash a delete_btn' aria-hidden='true'></i></span>"
            +
            "</div>"
            +
            "<input type='text' value='" + "http://" + window.location.host + item.url  + "' style='width:100%;'/>"
            +
            "</div>");
        });
    });
}

//onclick='showAlbumPictures("+ item.id +")'

$(document).on('click', '.album_block', function () {

    var id = $(this).data('id');

    $("#pictures_col").html("");

    $.get( "/picture/read?album_id="+ id, function( data ) {
        initPictures(data)
        // alert("transaction  =  true")
    });

    showAlbumPictures();
    
    albumId=id;
});



$(document).on('click', '.delete_btn', function () {

    var name = $(this).data('name');

    $.get( "/picture/delete?name="+ name, function( data ) {
        
        if(data.status == 'done'){

            $.get( "/picture/read?album_id="+ albumId, function( data ) {
                initPictures(data)
            });
            
        }
        alert(data.comment);
    });
});

$(document).on('click', '.album_delete_btn', function (e) {

    e.stopPropagation();

    var id = $(this).data('id');

    $.get( "/album/delete?album_id="+ id, function( data ) {
        
        if(data.status == 'done'){
            
            $.get( "/album/read", function( data ) {
                initAlbums(data)
                showAlbums();
            });
            
        }
        alert(data.comment);
    });
});

$(document).on('click', '#create_an_album', function () {

    showCreateAlbum();
});

$(document).on('click', '#show_alb', function () {

    showAlbums();
});

$(document).on('click', '#show_alb2', function () {

    showAlbums();
});

$(document).on('click', '#add_picture', function () {

    $('#priv').attr('src', "http://localhost:8000/images/site/up.png");

    showCreatePicture();
});

$(document).on('click', '#back_to_album_picture', function () {

    showAlbumPictures(albumId);
});

$(document).on('click', '#img_adder', function () {

    $.get( "/album/read", function( data ) {
        initAlbums(data)
        showAlbums();
    });

});

$(document).on('click', '#upload_new_picture', function () {

    var fd = new FormData($("#img_upload_form")[0]);
    fd.append('album_id', albumId);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            "cache-control": "no-cache" 
        }
    });

    $.ajax({
        type: "POST",
        url: "/picture/store",
        data: fd,
        contentType: false,
        processData: false,
        success: function(msg){

            $.get( "/picture/read?album_id="+msg.album_id, function( data ) {
                initPictures(data)
                showAlbumPictures(msg.album_id);
            });

            alert(msg.comment);
        },
        error: function(xhr, textStatus, errorThrown) {

            var data=JSON.parse(xhr.responseText);
            alert(data["comment"]);
         }
    });
});

$(document).on('click', '#create_new_album', function (event) {

    event.preventDefault(event);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        url: "/album/store",
        method: 'post',
        data: {
            name: jQuery('#name').val()
        },
        success: function(result){
            if(result.status == "done"){
                alert( "آلبوم جدید اضافه شد." );
                $.get( "/album/read", function( data ) {
                    initAlbums(data)
                    showAlbums();
                });
                
            }else{
                alert(result.error);
            }
        }});

});













    