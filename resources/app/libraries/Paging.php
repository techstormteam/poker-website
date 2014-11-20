<?php

class Paging {

    public $total_page;
    public $current_page;
    public $page_size;
    public $total_list;
    public $current_list;

    public function __construct() {
        
    }

    public function get_total_page($list_total, $page_size) {
        return ceil((count($list_total) / $page_size));
    }

    public function get_current_page_list($page_size, $current_page, $list_total) {
        $skip = ($current_page - 1) * $page_size; // skip = 0
        $current_list = array_slice($list_total, $skip, $page_size);
        return $current_list;
    }
}
