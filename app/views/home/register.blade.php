@extends('layout.bootstrap')

@section('content')
<section class="box-register center-block">
    {{ Form::open(array('url' => 'home/post_register', 'class' => 'ts-box form-horizontal')) }}
    <fieldset>
        <legend>
            <h1 class='center'>Register</h1>
        </legend>
        <div class="form-group">
            <label class="col-xs-2 control-label">Username:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='username' type='text' placeholder="Enter username">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Password:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='password1' type='password' placeholder="Enter password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Retype Password:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='password2' type='password' placeholder="Retype password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Nickname:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='nickname' type='text' placeholder="Enter nick name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Email:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='email' type='text' placeholder="Enter email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Avatar:</label>
            <div style="margin-left: 115px; padding-left: 10px; width: 140px; height: 200px; overflow: auto; border: solid 1px #999; border-radius: 5px;">
                <?php
                $avatarurl = "http://168.144.171.228:8087/Image?Name=Avatars";   // set your url here
                $avatarmax = 64;

                if (!empty(filter_input(INPUT_POST, 'avatar'))) {
                    $ava_img = filter_input(INPUT_POST, 'avatar');
                } else {
                    $ava_img = 0;
                }

                for ($i = 0; $i < $avatarmax; $i++)
                {
                    $a = "display: inline-block; width: 48px; height: 48px; background: " .
                            "url('" . $avatarurl . "') no-repeat -" . ($i * 48) . "px 0px;";
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
            <label class="col-xs-2 control-label">Phone Code:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='phone_code' type='text' placeholder="Enter phone code">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Phone:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='phone' type='text' placeholder="Enter phone number">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">First Name:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='first_name' type='text' placeholder="Enter first name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Last Name:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='last_name' type='text' placeholder="Enter last name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Gender:</label>
            <div class='col-xs-10'>
                <label style='font-weight: normal; width: 120px;'> <input type="radio" name="gender" class="icheck" value="Male" checked=""> Male</label>
                <label style='font-weight: normal; width: 120px;'> <input type="radio" name="gender" class="icheck" value="Female"> Female</label>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <label class="col-xs-2 control-label">IP:</label>
            <?php
            $info = json_decode(file_get_contents('http://ipinfo.io/json'));
            ?>
            <div class='col-xs-10'>
                <input class='form-control' name='ip' type='text' value='{{ $info->ip }}' disabled="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Country:</label>
            <div class='col-xs-10 form-inline'>
                <input class='form-control' name='country' type='text' value='{{ $info->country }}' disabled="" style='width: 50%; margin-right: 15px;'>
                <img src="http://shorter.in/flag.php">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">City:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='city' type='text' value='{{ $info->city }}' disabled="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">State:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='state' type='text' placeholder="Enter state">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Street Address:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='street_address' type='text' placeholder="Enter street address">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Zip Code:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='zip_code' type='text' placeholder="Enter zip code">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Bonus Code:</label>
            <div class='col-xs-10'>
                <input class='form-control' name='bonus_code' type='text' placeholder="Enter bonus code">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">How do you know about us?</label>
            <div class='col-xs-10'>
                <textarea class='form-control' name='answer' cols="38" rows="5" placeholder='Enter your answer'></textarea>
            </div>
        </div>
        <div class="center-block">
            <input class='btn btn-primary' name='submit' type='submit' class='btn-primary' value='Sign in' style="width: 100%;">
        </div>
    </fieldset>
    {{ Form::close() }}
</section>
@stop