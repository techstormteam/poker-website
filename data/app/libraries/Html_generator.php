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
class Html_generator {

    public static function divMessage($success_message = "", $info_message = "", $error_message = "") {
        if (!empty($error_message)) {
            echo '<div class="alert alert-danger alert-white rounded">';
            echo '    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo '    <div class="icon"><i class="fa fa-times-circle"></i></div>';
            echo '    <strong>Error!</strong> ' . $error_message;
            echo '</div>';
        } else if (!empty($success_message)) {
            echo '<div class="alert alert-success alert-white rounded">';
            echo '    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">×</button>';
            echo '    <div class = "icon"><i class = "fa fa-check"></i></div>';
            echo '    <strong>Success!</strong> ' . $success_message;
            echo '</div>';
        } else if (!empty($info_message)) {
            echo '<div class = "alert alert-info alert-white rounded">';
            echo '    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">×</button>';
            echo '    <div class = "icon"><i class = "fa fa-info-circle"></i></div>';
            echo '    <strong>Info!</strong> ' . $info_message;
            echo '</div>';
        }
    }

    public static function divNotification($title, $message) {
        if (!empty($title) && !empty($message)) {
            echo '<script>';
            echo '    $(document).ready(function() {';
            echo '        notification("Information", "' . $message . '");';
            echo '    });';
            echo '</script>';
        }
    }

}
