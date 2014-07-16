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
class Mail_sender {

    public static function giveFreerollsUser($user_email) {
        $message         = "You received a freeroll from ours poker website.";
        mail($user_email, "Congratulations, You received a freeroll", $message);
    }
    
    public static function notifyFreerollsAdmin($admin_email, $received_freeroll_username) {
        $message         = "a user '$received_freeroll_username' have received a freeroll.";
        mail($admin_email, "A user have received a freeroll", $message);
    }
}
