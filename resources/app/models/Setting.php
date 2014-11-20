<?php

class Setting extends Eloquent {
    protected $table = "settings";
    
    public static function getValue($key) {
        $data = self::where('key_option', '=', $key)->get()->toArray();
        if (!empty($data) && count($data) > 0) {
            return $data[0]['value_option'];
        }
    }
    
    public static function saveOption($key, $value) {
        
        $obj = self::where('key_option', '=', $key);
        $data = $obj->get()->toArray();
        if (!empty($data) && count($data) > 0) {
            $obj->update(array('value_option' => $value));
        } else {
            
        }
    }
}
