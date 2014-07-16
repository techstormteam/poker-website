<?php

class AdminTournamentController extends BaseController {

    public function __construct()
    {
        View::share('title', 'Poker');
        View::share('assets', asset('assets'));
    }

    public function get_index()
    {
        return View::make('admin.tournament.index');
    }

}