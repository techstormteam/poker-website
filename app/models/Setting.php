<?php

class Setting extends Eloquent {
    protected $table = "settings";
    
    public static function getValue($key) {
        return self::where('key_option', '=', $key);
    }
}
