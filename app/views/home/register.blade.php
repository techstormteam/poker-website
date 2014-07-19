@extends('layout.bootstrap')

@section('script')
@if(Session::has('register_message'))
<script>
    $.UIkit.notify('{{ Session::get("register_message") }}');
</script>
@endif
@stop

@section('content')
<section class="box-register center-block">
    {{ Form::open(array('url' => 'home/register', 'class' => 'ts-box form-horizontal')) }}
    <fieldset>
        <legend>
            <h1 class='center'>Register</h1>
        </legend>
        {{ HTML::ul($errors->all()) }}
        <div class="form-group">
            {{ Form::label('username', 'Username', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Enter username')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Retype password', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Retype password')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('nickname', 'Nickname', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('nickname', Input::old('nickname'), array('class' => 'form-control', 'placeholder' => 'Enter nickname')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('avatar', 'Avatar', array('class' => 'col-xs-2 control-label')) }}
            <div style="margin-left: 115px; padding-left: 10px; width: 140px; height: 200px; overflow: auto; border: solid 1px #999; border-radius: 5px;">
                <?php
                $avatarurl = "http://168.144.171.228:8087/Image?Name=Avatars";   // set your url here
                $avatarmax = 64;

                if (!empty(filter_input(INPUT_POST, 'avatar'))) {
                    $ava_img = filter_input(INPUT_POST, 'avatar');
                } else {
                    $ava_img = 1;
                }

                for ($i = 1; $i <= $avatarmax; $i++)
                {
                    $a = "display: inline-block; width: 48px; height: 48px; background: " .
                            "url('" . $avatarurl . "') no-repeat -" . (($i-1) * 48) . "px 0px;";
                    $s = "<input type='radio' name='avatar' value='" . ($i) . "'";
                    if ($i == $ava_img) {
                        $s .= " checked";
                    }
                    $s .= ">";
                    $s .= "<div style=\"" . $a . "\"></div>";
                    echo $s . "<br><br>\r\n";
                }
                ?>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            {{ Form::label('phone_code', 'Phone Code', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('phone_code', Input::old('phone_code'), array('class' => 'form-control', 'placeholder' => 'Enter phone code')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Phone', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control', 'placeholder' => 'Enter phone number')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('real_name', 'Real Name', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('real_name', Input::old('real_name'), array('class' => 'form-control', 'placeholder' => 'Enter real name')) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Gender</label>
            <div class='col-xs-10'>
                <label style='font-weight: normal; width: 120px;'> {{ Form::radio('gender', 'male', Input::old('gender', true)) }} Male</label>
                <label style='font-weight: normal; width: 120px;'> {{ Form::radio('gender', 'female', Input::old('gender')) }} Female</label>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            {{ Form::label('ip', 'IP', array('class' => 'col-xs-2 control-label')) }}
            <?php
            $info = json_decode(file_get_contents('http://ipinfo.io/json'));
            ?>
            <div class='col-xs-10'>
                {{ Form::text('ip', $info->ip, array('class' => 'form-control', 'readonly' => 'readonly')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('country', 'Country', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10 form-inline'>
                {{ Form::text('country', $info->country, array('class' => 'form-control', 'readonly' => 'readonly', 'style' => 'width: 85%; margin-right: 15px;')) }}
                <img src="http://shorter.in/flag.php">
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('city', 'City', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('city', $info->city, array('class' => 'form-control', 'readonly' => 'readonly')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('state', 'State', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('state', Input::old('state'), array('class' => 'form-control', 'placeholder' => 'Enter state')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('street_address', 'Street Address', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('street_address', Input::old('street_address'), array('class' => 'form-control', 'placeholder' => 'Enter street address')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('zip_code', 'Zip Code', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('zip_code', Input::old('zip_code'), array('class' => 'form-control', 'placeholder' => 'Enter zip code')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('bonus_code', 'Bonus Code', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::text('bonus_code', Input::old('bonus_code'), array('class' => 'form-control', 'placeholder' => 'Enter bonus code')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('answer', 'How do you know about us?', array('class' => 'col-xs-2 control-label')) }}
            <div class='col-xs-10'>
                {{ Form::textarea('answer', Input::old('answer'), ['class' => 'form-control', 'placeholder' => 'Enter your answer', 'size' => '50x5']) }}
            </div>
        </div>
        <div class="center-block">
            {{ Form::submit('Register', ['class' => 'btn btn-primary form-control']) }}
        </div>
    </fieldset>
    {{ Form::close() }}
</section>
@stop