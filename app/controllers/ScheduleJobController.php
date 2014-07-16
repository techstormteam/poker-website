<?php

class ScheduleJobController extends BaseController {

    public function __construct() {
        View::share('title', 'Poker');
        View::share('assets', asset('assets'));
    }

    public function get_give_freerolls() {
        
        // get setting model
        $freeroll_hand = Setting::getValue('freeroll_hand');
        if (empty($freeroll_hand)) {
            $freeroll_hand = 1;
        }
        $freeroll_hand_list_line = Setting::getValue('freeroll_hand_list_line');
        if (empty($freeroll_hand_list_line)) {
            $freeroll_hand_list_line = 0;
        }
        $freeroll_hand_line = Setting::getValue('freeroll_hand_line');
        if (empty($freeroll_hand_line)) {
            $freeroll_hand_line = 0;
        }
        
        // track to history list
        $history_list = Api::logs_hand_history_list(); 
        var_dump($history_list);
        for ($index = $freeroll_hand_list_line; $index < $history_list->Files; $index++) {
            // track to line reading
            $file = Api::logs_hand_history($history_list->Date[$index], $history_list->Name[$index]);
            if ($index == 16) {
            var_dump($file);
            }
            
            $line_num = count($file->Data);
            for ($line_index = $freeroll_hand_line; $line_index < $line_num; $line_index++) {
                
                // analize the where the "Seat"
                $line = $file->Data[$line_index];
                if (String_util::startsWith($line, "Seat ")) {
                    $playerName = String_util::parsePlayerName($line);
                    // increase hand of user
                    $hand_number = User::increaseHandNumber($playerName);
                    if (!empty($hand_number) && ($hand_number % $freeroll_hand === 0)) {
                        // have a freeroll
                        $email = User::increaseFreeroll($playerName);
//                        Mail_sender::giveFreerollsUser($email);
                    }
                }
                
            }
        }
        // set setting model
        Setting::saveOption('freeroll_hand_list_line', $history_list->Files - 1);
        Setting::saveOption('freeroll_hand_line', $line_num);
        
        
        return View::make('schedulejob.give_freerolls');
    }

}