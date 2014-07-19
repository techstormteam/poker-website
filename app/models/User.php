<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    
    use UserTrait, RemindableTrait;
    
    protected $table = "users";
    
    public static function increaseHandNumber($playerName) {
        $obj = self::where('username', '=', $playerName);
        $data = $obj->get()->toArray();
        if (!empty($data) && count($data) > 0) {
            $handNumber = $data[0]['freeroll_hand_number'];
            $obj->update(array('freeroll_hand_number' => $handNumber + 1));
            return $handNumber + 1;
        }
        return 0;
    }
    
    public static function increaseFreeroll($playerName) {
        $obj = self::where('username', '=', $playerName);
        $data = $obj->get()->toArray();
        if (!empty($data) && count($data) > 0) {
            $freeroll_avail = $data[0]['freeroll_available'];
            $obj->update(array('freeroll_available' => $freeroll_avail + 1));
            return $data[0]['email'];
        }
        return "";
    }
}
