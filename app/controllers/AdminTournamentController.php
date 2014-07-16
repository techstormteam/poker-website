<?php

class AdminTournamentController extends BaseController {

    public function __construct() {
        View::share('title', 'Poker');
        View::share('assets', asset('assets'));
    }

    public function get_index() {
        return View::make('admin.tournament.index');
    }

    public function get_add_view() {
//      $result = Api::tournaments_add(
//                "test tour", //name
//                "Limit Hold'em", // game
//                "No", //private
//                "Yes", //playerChat
//                "Yes", //observerChat
//                5, //tables
//                9, //seats
//                "Yes", //startFull
//                0, //startMin
//                88, //startCode
//                "2014-04-07 05:30", //startTime
//                50, //minPlayers
//                60, //recurMinutes
//                "Yes", //removeNoShows
//                50, //buyIn
//                0, //entryFee
//                100, //prizeBonus
//                "Yes", //multiplyBonus
//                10 , //chips
//                10 , //turnClock
//                20 , //timeBank
//                5 , //level
//                0 , //rebuyLevels
//                60 , //breakTime
//                6 , //breakLevels
//                "500 character" , //description
//                "" , //blinds
//                "" , //payout
//                "Yes"); //auto

//        $keep_data = Value_default::tournamentDefault();
        
        return View::make('admin.tournament.add_view');
        
    }
    
}