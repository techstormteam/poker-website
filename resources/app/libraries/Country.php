<?php

class Country {

    public static function get_user_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public static function get_country_flag() {
        return '<img src="http://shorter.in/flag.php">';
    }

    public static function get_country($ip) {
        return trim(file_get_contents("http://ipinfo.io/{$ip}/country"));
    }

    public static function get_user_info() {
        $rs_json = trim(file_get_contents("http://ipinfo.io/json"));
        $rs = \json_decode($rs_json, true);
        if (!empty($rs['bogon'])) {
            $rs['hostname'] = 'localhost';
            $rs['loc'] = '0,0';
            $rs['org'] = '';
            $rs['city'] = '';
            $rs['region'] = '';
            $rs['country'] = '';
            $rs['phone'] = '';
        }
        return $rs;
    }

    public static function get_ip_info($ip) {
        $rs_json = trim(file_get_contents("http://ipinfo.io/{$ip}"));
        $rs = \json_decode($rs_json, true);
        if (!empty($rs['bogon'])) {
            $rs['hostname'] = 'localhost';
            $rs['loc'] = '0,0';
            $rs['org'] = '';
            $rs['city'] = '';
            $rs['region'] = '';
            $rs['country'] = '';
            $rs['phone'] = '';
        }
        return $rs;
    }

    public static function get_list_country_code() {
        $CI = & get_instance();
        $CI->load->helper('url', 'file');
        $list_country_code = array();
        $lines = file(real_file('./countries.txt'));
        foreach ($lines as $row) {
            $row = trim($row);
            $country_code = substr($row, 0, 2);
            array_push($list_country_code, $country_code);
        }

        return $list_country_code;
    }

    public static function get_list_country_name() {
        $CI = & get_instance();
        $CI->load->helper('url', 'file');
        $list_country_name = array();
        $lines = file(real_file('./countries.txt'));
        foreach ($lines as $row) {
            $row = trim($row);
            $country_name = substr($row, 3);
            array_push($list_country_name, $country_name);
        }

        return $list_country_name;
    }

    public static function get_list_obj_country() {
        $CI = & get_instance();
        $CI->load->helper('url', 'file');
        $list = array();
        $lines = file(real_file('./countries.txt'));
        foreach ($lines as $row) {
            $row = trim($row);
            $country_code = substr($row, 0, 2);
            $country_name = substr($row, 3);
            $item = array('code' => $country_code, 'name' => $country_name);
            array_push($list, $item);
        }

        return $list;
    }

    public static function get_name_by_code($code) {
        $list = self::get_list_obj_country();

        foreach ($list as $item) {
            if ($item['code'] == $code) {
                return $item['name'];
            }
        }

        return '';
    }

}
