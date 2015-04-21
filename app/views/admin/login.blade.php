@extends("layouts.index")
@section("title")
    Login
@stop
@section("css")
    @parent
@stop
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(["action" => "AdminController@postSignin", "method" => "POST", "role" => "form"]) }}
                            <div class="form-group">
                                {{ Form::text("email", "", ["class" => "form-control", "placeholder" => "E-mail"]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::password("password", ["class" => "form-control", "placeholder" => "Password"]) }}
                            </div>
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox("remember", "Remember Me") }}Remember Me
                                </label>
                            </div>
                            {{ Form::submit("Login", ["class" => "btn btn-lg btn-success btn-block"]) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section("javascript")
    @parent
@stop
