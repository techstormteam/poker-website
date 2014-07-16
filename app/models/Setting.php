<?php

class Setting extends Eloquent {
    protected $table = "settings";
    
    public static function getValue($key) {
        $data = self::where('key_option', '=', $key)->get()->toArray();
        if (!empty($data) && count($data) > 0) {
            return $data[0]['value_option'];
        }
    }
}
