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
class Value_default {

    public static function tournamentDefault() {
        $default_data = array(
            'txtTables' => '1',
            'txtSeats' => '2',
            'txtStartMin' => '0',
            'txtStartCode' => '0',
            'txtMinPlayers' => '2',
            'txtRecurMinutes' => '-1',
            'txtChips' => '10',
            'txtTurnClock' => '10',
            'txtTimeBank' => '0',
            'txtLevel' => '1',
            'txtRebuyLevels' => '0',
            'txtBreakTime' => '0',
            'txtBreakLevels' => '0',
            'txtName' => '',
            'ckbPrivate' => '',
            'ckbPlayerChat' => 'on',
            'ckbObserverChat' => '',
            'ckbStartFull' => '',
            'txtStartTime' => '',
            'txtRemoveNoShows' => '',
            'txtBuyIn' => '0',
            'txtEntryFee' => '0',
            'txtPrizeBonus' => '0',
            'rdoMultiplyBonus' => '',
            'txtDescription' => '',
            'txtBlinds' => '',
            'txtPayout' => '',
            'ckbAuto' => 'on',
        );
        return $default_data;
    }

}
