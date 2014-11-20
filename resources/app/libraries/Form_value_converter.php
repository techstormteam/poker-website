<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormValueConverter
 *
 * @author Thien
 */
class Form_value_converter {

    public static function checkBoxValue($value = "off") {
        if ($value === 'on') {
            return "Yes";
        } else {
            return "No";
        }
    }

    public static function htmlCheckBoxValue($value = "off") {
        if ($value === 'on') {
            return "checked";
        } else {
            return "";
        }
    }

}
