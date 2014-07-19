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
        $keep_data = Value_default::tournamentDefault();
        
        return View::make('admin.tournament.add_view', array('keep_data'=>$keep_data));
        
    }
    
    public function get_list_view() {

        $result = Api::tournaments_list();

        return View::make('admin.tournament.list_view', array(
                'result' => $result,
                    ));
    }
    
    public function post_add() {
        
        
        
        
        $response = Api::tournaments_add(
                filter_input(INPUT_POST, 'txtName'),
                filter_input(INPUT_POST, 'ddlGame'),
                Form_value_converter::checkBoxValue(filter_input(INPUT_POST, 'ckbPrivate')),
                Form_value_converter::checkBoxValue(filter_input(INPUT_POST, 'ckbPlayerChat')),
                Form_value_converter::checkBoxValue(filter_input(INPUT_POST, 'ckbObserverChat')),
                filter_input(INPUT_POST, 'txtTables'),
                filter_input(INPUT_POST, 'txtSeats'),
                Form_value_converter::checkBoxValue(filter_input(INPUT_POST, 'ckbStartFull')),
                filter_input(INPUT_POST, 'txtStartMin'),
                filter_input(INPUT_POST, 'txtStartCode'),
                filter_input(INPUT_POST, 'txtStartTime'),
                filter_input(INPUT_POST, 'txtMinPlayers'),
                filter_input(INPUT_POST, 'txtRecurMinutes'),
                filter_input(INPUT_POST, 'txtRemoveNoShows'),
                filter_input(INPUT_POST, 'txtBuyIn'),
                filter_input(INPUT_POST, 'txtEntryFee'),
                filter_input(INPUT_POST, 'txtPrizeBonus'),
                filter_input(INPUT_POST, 'rdoMultiplyBonus'),
                filter_input(INPUT_POST, 'txtChips'),
                filter_input(INPUT_POST, 'txtTurnClock'),
                filter_input(INPUT_POST, 'txtTimeBank'),
                filter_input(INPUT_POST, 'txtLevel'),
                filter_input(INPUT_POST, 'txtRebuyLevels'),
                filter_input(INPUT_POST, 'txtBreakTime'),
                filter_input(INPUT_POST, 'txtBreakLevels'),
                filter_input(INPUT_POST, 'txtDescription'),
                filter_input(INPUT_POST, 'txtBlinds'),
                filter_input(INPUT_POST, 'txtPayout'),
                Form_value_converter::checkBoxValue(filter_input(INPUT_POST, 'ckbAuto')));

        
        if ($response->Result === 'Ok') {
            $result = Api::tournaments_list();
return Redirect::action('AdminTournamentController@get_list_view');
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
        return Redirect::action('AdminTournamentController@get_list_view');
    }

    public function get_online($name) {
        $name = urldecode($name);
        Api::tournaments_online($name);
        return Redirect::action('AdminTournamentController@get_list_view');
    }

    public function get_offline($name) {
        $name = urldecode($name);
        Api::tournaments_offline($name);
        return Redirect::action('AdminTournamentController@get_list_view');
    }
}
