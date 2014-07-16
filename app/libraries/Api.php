<?php

class Api {

    public static $url = "http://168.144.171.228:8087/api";     // <-- use your game server IP
    public static $pw = "poker_joker123";                    // <-- use your api password

    public static function call_api($params) {
        $params['Password'] = self::$pw;
        $params['JSON'] = 'Yes';
        $curl = curl_init(self::$url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $obj = (object) array('Result' => 'Error', 'Error' => curl_error($curl));
        } else if (empty($response)) {
            $obj = (object) array('Result' => 'Error', 'Error' => 'Connection failed');
        } else {
            $obj = json_decode($response);
        }
        return $obj;
    }

    public static function accounts_inc_balance($player, $amount) {
        $params["Command"] = "AccountsIncBalance";
        $params["Player"] = $player;
        $params["Amount"] = $amount;

        $api = self::call_api($params);
        return $api;
    }

    public static function register_given_freeroll($player, $tournament_name) {
        $tournament_info = self::tournaments_get($tournament_name);
        self::accounts_inc_balance($player, $tournament_info->EntryFee);
        self::tournaments_register($player, $tournament_name);
    }

    public static function logs_hand_history($date, $name) {
        $params["Command"] = "LogsHandHistory";
        $params["Date"] = $date;
        $params["Name"] = $name;

        $api = self::call_api($params);
        return $api;
    }

    public static function logs_hand_history_list() {
        $params["Command"] = "LogsHandHistory";

        $api = self::call_api($params);
        return $api;
    }

    public static function accounts_list($field = NULL) {
        $params["Command"] = "AccountsList";
        if ($field === NULL) {
            $params["Fields"] = "Player,Title";
        } else {
            $params['Fields'] = $field;
        }
        $api = self::call_api($params);
        return $api;
    }

    public static function check_account($value) {
        $accounts_list = self::accounts_list('Player,Email');
        if (in_array($value['username'], $accounts_list->Player)) {
            return 'username';
        } elseif (in_array($value['email'], $accounts_list->Email)) {
            return 'email';
        } else {
            return NULL;
        }
    }

    public static function add_account($account) {
        $params['Command'] = 'AccountsAdd';
        $params['Player'] = $account['username'];
        $params['Title'] = $account['nickname'];
        $params['RealName'] = $account['first_name'] . ' ' . $account['last_name'];
        $params['PW'] = $account['password'];
        $params['Location'] = $account['city'] . ', ' . $account['state'];
        $params['Email'] = $account['email'];
        $params['Avatar'] = $account['avatar'];
        $params['Gender'] = $account['gender'];
        $params['Chat'] = 'Yes';

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_add(
    $name, $game, $private, $playerChat, $observerChat, $tables, $seats, $startFull, $startMin, $startCode, $startTime, $minPlayers, $recurMinutes, $removeNoShows, $buyIn = 0, $entryFee = 0, $prizeBonus = 0, $multiplyBonus, $chips, $turnClock, $timeBank, $level, $rebuyLevels, $breakTime, $breakLevels, $description, $blinds, $payout, $auto) {
        $params["Command"] = "TournamentsAdd";
        $params["Name"] = $name;
        $params["Game"] = $game;
        $params["Private"] = $private;
        $params["PlayerChat"] = $playerChat;
        $params["ObserverChat"] = $observerChat;
        $params["Tables"] = $tables;
        $params["Seats"] = $seats;
        $params["StartFull"] = $startFull;
        $params["StartMin"] = $startMin;
        $params["StartCode"] = $startCode;
        $params["StartTime"] = $startTime;
        $params["MinPlayers"] = $minPlayers;
        $params["RecurMinutes"] = $recurMinutes;
        $params["RemoveNoShows"] = $removeNoShows;
        $params["BuyIn"] = $buyIn;
        $params["EntryFee"] = $entryFee;
        $params["PrizeBonus"] = $prizeBonus;
        $params["MultiplyBonus"] = $multiplyBonus;
        $params["Chips"] = $chips;
        $params["TurnClock"] = $turnClock;
        $params["TimeBank"] = $timeBank;
        $params["Level"] = $level;
        $params["RebuyLevels"] = $rebuyLevels;
        $params["BreakTime"] = $breakTime;
        $params["BreakLevels"] = $breakLevels;
        $params["Description"] = $description;
        $params["Blinds"] = $blinds;
        $params["Payout"] = $payout;
        $params["Auto"] = $auto;

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_list() {
        $params["Command"] = "TournamentsList";
        $params["Fields"] = "Name,Game,BuyIn,EntryFee,Status";

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_online($name) {
        $params["Command"] = "TournamentsOnline";
        $params["Name"] = $name;

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_offline($name) {
        $params["Command"] = "TournamentsOffline";
        $params["Name"] = $name;
        $params["Now"] = "Yes";

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_delete($name) {
        $params["Command"] = "TournamentsDelete";
        $params["Name"] = $name;

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_register($player, $name) {
        $params["Command"] = "TournamentsRegister";
        $params["Player"] = $player;
        $params["Name"] = $name;

        $api = self::call_api($params);
        return $api;
    }

    public static function tournaments_get($name) {
        $params["Command"] = "TournamentsGet";
        $params["Name"] = $name;

        $api = self::call_api($params);
        return $api;
    }

    public static function system_get($property) {
        $params["Command"] = "SystemGet";
        $params["Property"] = $property;
        $api = self::call_api($params);
        return $api;
    }

    public static function system_entry_fee_get($name) {
        $params["Command"] = "SystemEntryFeeGet";

        $api = self::call_api($params);
        return $api;
    }

    public static function system_entry_fee_set($name, $balance) {
        $params["Command"] = "SystemEntryFeeSet";

        $api = self::call_api($params);
        return $api;
    }

}

/* End of file Api.php */