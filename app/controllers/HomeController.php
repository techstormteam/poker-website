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

}