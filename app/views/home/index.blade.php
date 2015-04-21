@extends("layouts.index")
@section("title")
    Login
@stop
@section("css")
    @parent
@stop
@section("content")
    <div class="jumbotron">
        <h2>Home page</h2>
        {{ link_to("/login", "Login", ["class" => "btn btn-success"]) }}
    </div>
@stop
@section("javascript")
    @parent
@stop
