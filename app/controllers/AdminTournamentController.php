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

        $keep_data = Value_default::tournamentDefault();
        
        return View::make('admin.tournament.add_view', array('keep_data'=>$keep_data));
        
    }
    
    public function get_list_view() {

        $result = Api::tournaments_list();

        return View::make('admin.tournament.list_view', array(
                'result' => $result,
                    ));
    }
    
    public function get_add() {

        $response = Api::tournaments_add(
                        filter_input(INPUT_POST, 'txtName'), filter_input(INPUT_POST, 'ddlGame'), FormValueConverter::checkBoxValue(filter_input(INPUT_POST, 'ckbPrivate')), FormValueConverter::checkBoxValue(filter_input(INPUT_POST, 'ckbPlayerChat')), FormValueConverter::checkBoxValue(filter_input(INPUT_POST, 'ckbObserverChat')), filter_input(INPUT_POST, 'txtTables'), filter_input(INPUT_POST, 'txtSeats'), FormValueConverter::checkBoxValue(filter_input(INPUT_POST, 'ckbStartFull')), filter_input(INPUT_POST, 'txtStartMin'), filter_input(INPUT_POST, 'txtStartCode'), filter_input(INPUT_POST, 'txtStartTime'), filter_input(INPUT_POST, 'txtMinPlayers'), filter_input(INPUT_POST, 'txtRecurMinutes'), filter_input(INPUT_POST, 'txtRemoveNoShows'), filter_input(INPUT_POST, 'txtBuyIn'), filter_input(INPUT_POST, 'txtEntryFee'), filter_input(INPUT_POST, 'txtPrizeBonus'), filter_input(INPUT_POST, 'rdoMultiplyBonus'), filter_input(INPUT_POST, 'txtChips'), filter_input(INPUT_POST, 'txtTurnClock'), filter_input(INPUT_POST, 'txtTimeBank'), filter_input(INPUT_POST, 'txtLevel'), filter_input(INPUT_POST, 'txtRebuyLevels'), filter_input(INPUT_POST, 'txtBreakTime'), filter_input(INPUT_POST, 'txtBreakLevels'), filter_input(INPUT_POST, 'txtDescription'), filter_input(INPUT_POST, 'txtBlinds'), filter_input(INPUT_POST, 'txtPayout'), FormValueConverter::checkBoxValue(filter_input(INPUT_POST, 'ckbAuto')));

        if ($response->Result === 'Ok') {
            $result = Api::tournaments_list();

            return View::make('admin.tournament.list_view', array(
                'info_message' => "Tournament Added Successfully.",
                'result' => $result,
                    ));
            
        } else {
            $error_message = $response->Error;
            if (empty($error_message)) {
                $error_message = "";
            }

            $keep_data = Value_default::tournamentDefault();
            $post_values = $_POST;
            foreach ($post_values as $key => $value) {
                $keep_data[$key] = $post_values[$key];
            }

            return View::make('admin.tournament.add_view', array(
                'error_message' => $error_message,
                'keep_data'=>$keep_data,
                    ));
        }
    }
    
    public function get_delete($name) {
        $name = urldecode($name);
        Api::tournaments_delete($name);
        $this->get_list_view();
    }

    public function get_online($name) {
        $name = urldecode($name);
        Api::tournaments_online($name);
        $this->get_list_view();
    }

    public function get_offline($name) {
        $name = urldecode($name);
        Api::tournaments_offline($name);
        $this->get_list_view();
    }
}