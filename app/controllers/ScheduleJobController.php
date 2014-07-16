<?php

class ScheduleJobController extends BaseController {

    public function __construct() {
    }

    public function get_give_freerolls() {
        // get setting model
        $freeroll_hand = $this->setting_model->get_value('freeroll_hand');
        if (empty($freeroll_hand)) {
            $freeroll_hand = 1;
        }
        $freeroll_hand_list_line = $this->setting_model->get_value('freeroll_hand_list_line');
        if (empty($freeroll_hand_list_line)) {
            $freeroll_hand_list_line = 0;
        }
        $freeroll_hand_line = $this->setting_model->get_value('freeroll_hand_line');
        if (empty($freeroll_hand_line)) {
            $freeroll_hand_line = 0;
        }
        
        $response = array();
        $response[count($response)] = Api::system_get("LoginChime");
        /*
        // track to history list
        $history_list = Api::logs_hand_history_list();
        for ($index = $freeroll_hand_list_line; $index < $history_list->Files; $index++) {
            $response[count($response)] = 1111;
            // track to line reading
            $file = Api::logs_hand_history($history_list->Date[$index], $history_list->Name[$index]);
            $line_num = count($file->Data);
            for ($line_index = $freeroll_hand_line; $line_index < $line_num; $line_index++) {
                
                // analize the where the "Seat"
                $line = $file->Data[$line_index];
                if (String_util::startsWith($line, "Seat ")) {
                    $playerName = String_util::parsePlayerName($line);
                    // increase hand of user
                    $hand_number = $this->user_model->increase_hand_number($playerName);
                    if ($hand_number % $freeroll_hand === 0) {
                        // have a freeroll
//                        $response[count($response)] = $playerName;
//                        $response[count($response)] = Api::system_entry_fee_get($playerName);
                        break;
                    }
                }
                
            }
        }*/
        // set setting model
//        $this->setting_model->set_value($freeroll_hand_list_line,$history_list->Files - 1);
//        $this->setting_model->set_value($freeroll_hand_line,$line_num - 1);
        
        
        return View::make('schedulejob.give_freerolls', array('response' => $response));
    }

}