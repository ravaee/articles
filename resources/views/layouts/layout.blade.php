<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>وبسایت محمد روایی</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="/css/fonts.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/blog-home.css" rel="stylesheet">
    <link href="/css/album_editor.css" rel="stylesheet">

    <!--  Bootstrap-RTL -->
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    @yield('styles')



</head>

<body>


    @include('./components/navbar')

    <!-- Page Content -->
    <div class="container-fluid my_container">

        <div class="row">


            
                @yield('content')



        </div>


    </div>






        <!-- Footer -->
    @include('components.footer')
    <!-- /.container -->


    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/site.js"></script>


    @yield('scripts')

</body>

</html>
