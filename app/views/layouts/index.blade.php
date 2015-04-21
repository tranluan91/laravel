<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Blog | @yield("title", "Home")
    </title>
    <meta http-equiv="content-language" content="en"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- CSS -->
    @section("css")
        {{ HTML::style("bower/bootstrap/dist/css/bootstrap.min.css") }}
        {{ HTML::style("bower/metisMenu/dist/metisMenu.min.css") }}
        {{ HTML::style("bower/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css") }}
        {{ HTML::style("bower/font-awesome/css/font-awesome.min.css") }}
        {{ HTML::style("css/main.css") }}
    @show
    <!-- end CSS -->
</head>
<body>
    <div id="wrapper">
        @if(Auth::check())
            @include("layouts.header")
        @endif
        @if(Session::has('message'))
            <div id="flash-messages">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif
        @section("content")
        @show
    </div>
    @section("javascript")
        {{ HTML::script("bower/jquery/dist/jquery.min.js") }}
        {{ HTML::script("bower/bootstrap/dist/js/bootstrap.min.js") }}
        {{ HTML::script("bower/metisMenu/dist/metisMenu.min.js") }}
        {{ HTML::script("bower/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js") }}
    @show
</body>
</html>
