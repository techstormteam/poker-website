<?php

class TestController extends BaseController {

    public function __construct()
    {
        View::share('title', 'Poker');
        View::share('assets', asset('assets'));
    }
    
    public function get_login()
    {
        return View::make('test.login'); 
    }

    public function post_login()
    {
        
    }
    
}