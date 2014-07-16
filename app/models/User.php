<?php

class User extends Eloquent {
    protected $table = "users";
    
    public static function increaseHandNumber($playerName) {
        $obj = self::where('username', '=', $playerName)->get()->toArray();
        var_dump($obj);
        $data = $obj->toArray();
        if (!empty($data) && count($data) > 0) {
            $handNumber = $data[0]['freeroll_hand_number'];
            
//            $obj->freeroll_hand_number = $handNumber + 1;
//            $obj->save();
//            return $obj->freeroll_hand_number;
        }
        return 0;
    }
}
