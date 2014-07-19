<?php

class HomeController extends BaseController {

    public function __construct()
    {
        View::share('title', 'Poker');
        View::share('assets', asset('assets'));
    }

    public function get_index()
    {
        return View::make('home.index');
    }
    
    public function get_login() {
        return View::make('home.login');
    }
    
    public function post_login() {
        //Validation
        $rules = array(
            'username' => 'required|alpha_dash',
            'password' => 'required|alpha_num|min:6',
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails()) {
            return Redirect::to('home/login')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password'),
            );
            
            if(Auth::attempt($userdata)){
                Session::flash('login_message', 'Login successfully!');
                return Redirect::to('home/index');
            } else {
                Session::flash('login_message', 'Incorrect username or password');
                return Redirect::to('home/login');
            }
        }
    }

    public function get_logout() {
        Auth::logout();
        return Redirect::to('home/index');
    }


    public function get_register(){
        return View::make('home.register');
    }

    public function post_register() {
        
    }
}