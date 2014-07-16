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
    
    public function login() {
        return View::make('home.login');
    }
    
    public function register(){
        return View::make('home.register');
    }

}