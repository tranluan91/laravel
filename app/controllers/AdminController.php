<?php

class AdminController extends BaseController
{
    protected $layout = 'layouts.index';

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getLogin()
    {
        $this->layout->content = View::make('admin.login');
    }

    public function postSignin()
    {
        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
            return Redirect::to('/dashboard')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('/login')->with('message', 'Invalid email or password')->withInput();
        }
    }

    public function getRegister()
    {
        $this->layout->content = View::make('admin.register');
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), Admin::$rules);
        if ($validator->fails()) {
            return Redirect::to('/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
        $admin = new Admin;
        $admin->email = Input::get('email');
        $admin->password = Hash::make(Input::get('password'));
        $admin->save();
        return Redirect::to('/login')->with('message', 'Thanks for register');
    }

    public function getDashboard()
    {
        $this->layout->content = View::make('admin.dashboard');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/login')->with('message', 'You are logged out!');
    }
}