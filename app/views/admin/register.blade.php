@extends("layouts.index")
@section("title")
    Register
@stop
@section("css")
    @parent
@stop
@section("content")
    <div class="jumbotron">
        <h2>Register</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{ Form::open(["action" => "AdminController@store", "method" => "POST", "class" => "well form-horizontal"]) }}
            <div class="form-group">
                {{ Form::label("email", "E-Mail Address", ["class" => "col-md-2"]) }}
                <div class="col-md-8">
                    {{ Form::text("email", "", ["class" => "form-control", "placeholder" => "exam@example.com"]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label("password", "Password", ["class" => "col-md-2"]) }}
                <div class="col-md-8">
                    {{ Form::password("password", ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label("password", "Confirm Password", ["class" => "col-md-2"]) }}
                <div class="col-md-8">
                    {{ Form::password("password_confirmation", ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    {{ Form::submit("Register", ["class" => "btn btn-success"]) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
@section("javascript")
    @parent
@stop
