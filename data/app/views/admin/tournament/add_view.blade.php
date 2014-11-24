@extends('layout.administrator')

@section('content')
<div class="page-head">
    <h2>Add Tournament</h2>
    <ol class="breadcrumb">
        <li class="active">Form to add a new tournament.</li>
    </ol>
</div>
<div class="cl-mcont">
    <h3 class="text-center">Add Tournament</h3>
    <?php
    if (!empty($error_message)) {
        Html_generator::divMessage("", "", $error_message);
    }
    ?>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="block-flat">
            <div class="header">
                <h3>Add Tournament</h3>
            </div>
            <div class="content">
                <form class="form-horizontal group-border-dashed" action="{{ URL::to('admin/tournament/add'); }}" method="POST" style="border-radius: 0px;">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtName" class="form-control" value="{{ $keep_data['txtName']; }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Game</label>
                        <div class="col-sm-6">
                            <select name="ddlGame" class="form-control">
                                <option>Limit Hold'em</option>
                                <option>Pot Limit Hold'em</option>
                                <option>No Limit Hold'em</option>
                                <option>Limit Omaha</option>
                                <option>Pot Limit Omaha</option>
                                <option>No Limit Omaha</option>
                                <option>Limit Omaha Hi-Lo</option>
                                <option>Pot Limit Omaha Hi-Lo</option>
                                <option>No Limit Omaha Hi-Lo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Private</label>
                        <div class="col-sm-6">
                            <input class="switch" name="ckbPrivate" type="checkbox" <?= Form_value_converter::htmlCheckBoxValue($keep_data['ckbPrivate']); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Player Chat</label>
                        <div class="col-sm-6">
                            <input class="switch" name="ckbPlayerChat" type="checkbox" <?= Form_value_converter::htmlCheckBoxValue($keep_data['ckbPlayerChat']); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Observer Chat</label>
                        <div class="col-sm-6">
                            <input class="switch" name="ckbObserverChat" type="checkbox" <?= Form_value_converter::htmlCheckBoxValue($keep_data['ckbObserverChat']); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tables</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtTables" id="tables_slider" class="form-control" value="{{ $keep_data['txtTables'] }}" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="{{ $keep_data['txtTables'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="tables" class="slider-value">{{ $keep_data['txtTables'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Seats</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtSeats" id="seats_slider" class="form-control" value="{{ $keep_data['txtSeats'] }}" data-slider-min="2" data-slider-max="10" data-slider-step="1" data-slider-value="{{ $keep_data['txtSeats'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="seats" class="slider-value">{{ $keep_data['txtSeats'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start Full</label>
                        <div class="col-sm-6">
                            <input class="switch" name="ckbStartFull" type="checkbox" <?= Form_value_converter::htmlCheckBoxValue($keep_data['ckbStartFull']); ?> >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start Min</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtStartMin" id="start_min_slider" class="form-control" value="{{ $keep_data['txtStartMin']; }}" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="{{ $keep_data['txtStartMin'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="start_min" class="slider-value">{{ $keep_data['txtStartMin']; }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start Code</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtStartCode" id="start_code_slider" class="form-control" value="{{ $keep_data['txtStartCode'] }}" data-slider-min="0" data-slider-max="999999" data-slider-step="1" data-slider-value="{{ $keep_data['txtStartCode'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="start_code" class="slider-value">{{ $keep_data['txtStartCode'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start Time</label>
                        <div class="col-sm-6">
                            <div class="input-group date datetime col-md-5 col-xs-7" data-show-meridian="true" data-start-view="0" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:ii" data-link-field="dtp_input1">
                                <input id="start_time_datetimepicker" class="form-control" name="txtStartTime" size="16" type="text" value="{{ $keep_data['txtStartTime'] }}">
                                <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Min Players</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtMinPlayers" id="min_players_slider" class="form-control" value="{{ $keep_data['txtMinPlayers'] }}" data-slider-min="2" data-slider-max="1000" data-slider-step="1" data-slider-value="{{ $keep_data['txtMinPlayers'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="min_players" class="slider-value">{{ $keep_data['txtMinPlayers'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Recur Minutes</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtRecurMinutes" id="recur_minutes_slider" class="form-control" value="{{ $keep_data['txtRecurMinutes'] }}" data-slider-min="-1" data-slider-max="999999" data-slider-step="1" data-slider-value="{{ $keep_data['txtRecurMinutes'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="recur_minutes" class="slider-value">{{ $keep_data['txtRecurMinutes'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Remove No Shows</label>
                        <div class="col-sm-6">
                            <input class="switch" name="txtRemoveNoShows" type="checkbox" <?= Form_value_converter::htmlCheckBoxValue($keep_data['txtRemoveNoShows']); ?> >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Buy In</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input name="txtBuyIn" type="text" class="form-control" value="{{ $keep_data['txtBuyIn'] }}" placeholder="0">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Entry Fee</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" name="txtEntryFee" class="form-control" value="{{ $keep_data['txtEntryFee'] }}" placeholder="0">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Prize Bonus</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" name="txtPrizeBonus" class="form-control" value="{{ $keep_data['txtPrizeBonus'] }}" placeholder="0">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Multiply Bonus</label>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" name="rdoMultiplyBonus" value="Yes">Yes
                            </label>
                            <label class="btn btn-default active">
                                <input type="radio" name="rdoMultiplyBonus" value="No" checked="">No
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="rdoMultiplyBonus" value="Min">Min
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Chips</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtChips" id="chips_slider" class="form-control" value="{{ $keep_data['txtChips'] }}" data-slider-min="10" data-slider-max="25000" data-slider-step="1" data-slider-value="{{ $keep_data['txtChips'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="chips" class="slider-value">{{ $keep_data['txtChips'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Turn Clock</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtTurnClock" id="turn_clock_slider" class="form-control" value="{{ $keep_data['txtTurnClock'] }}" data-slider-min="10" data-slider-max="120" data-slider-step="1" data-slider-value="{{ $keep_data['txtTurnClock'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="turn_clock" class="slider-value">{{ $keep_data['txtTurnClock'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Time Bank</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtTimeBank" id="time_bank_slider" class="form-control" value="{{ $keep_data['txtTimeBank'] }}" data-slider-min="0" data-slider-max="600" data-slider-step="1" data-slider-value="{{ $keep_data['txtTimeBank'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="time_bank" class="slider-value">{{ $keep_data['txtTimeBank'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Level</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtLevel" id="level_slider" class="form-control" value="{{ $keep_data['txtLevel'] }}" data-slider-min="1" data-slider-max="1000" data-slider-step="1" data-slider-value="{{ $keep_data['txtLevel'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="level" class="slider-value">{{ $keep_data['txtLevel'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rebuy Levels</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtRebuyLevels" id="rebuy_levels_slider" class="form-control" value="{{ $keep_data['txtRebuyLevels'] }}" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="{{ $keep_data['txtRebuyLevels'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="rebuy_levels" class="slider-value">{{ $keep_data['txtRebuyLevels'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Break Time</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtBreakTime" id="break_time_slider" class="form-control" value="{{ $keep_data['txtBreakTime'] }}" data-slider-min="0" data-slider-max="60" data-slider-step="1" data-slider-value="{{ $keep_data['txtBreakTime'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="break_time" class="slider-value">{{ $keep_data['txtBreakTime'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Break Levels</label>
                        <div class="col-sm-6">
                            <input type="text" name="txtBreakLevels" id="break_levels_slider" class="form-control" value="{{ $keep_data['txtBreakLevels'] }}" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="{{ $keep_data['txtBreakLevels'] }}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                            <span id="break_levels" class="slider-value">{{ $keep_data['txtBreakLevels'] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea name="txtDescription" class="form-control">{{ $keep_data['txtDescription']; }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Blinds</label>
                        <div class="col-sm-6">
                            <textarea name="txtBlinds" class="form-control">{{ $keep_data['txtBlinds']; }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payout</label>
                        <div class="col-sm-6">
                            <textarea name="txtPayout" class="form-control">{{ $keep_data['txtPayout']; }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Auto</label>
                        <div class="col-sm-6">
                            <input name="ckbAuto" class="switch" type="checkbox" <?= Form_value_converter::htmlCheckBoxValue($keep_data['ckbAuto']); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="col-sm-6 btn btn-primary" type="submit">Submit</button>
                        <button class="col-sm-3 btn btn-default" onclick="location.href = '{{ URL::to('admin/tournament/list_view'); }}'">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@stop
