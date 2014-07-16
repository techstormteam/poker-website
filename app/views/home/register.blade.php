@extends('layout.master')

@section('content')
<section class="box box-register">
    <h1>Register</h1>
    <form action="" method='POST'>
        <div class="form-inline">
            <label>Username:</label>
            <input name='username' type='text' placeholder="Enter username">
        </div>
        <div class="form-inline">
            <label>Password:</label>
            <input name='password1' type='password' placeholder="Enter password">
        </div>
        <div class="form-inline">
            <label>Retype Password:</label>
            <input name='password2' type='password' placeholder="Retype password">
        </div>
        <div class="form-inline">
            <label>Nickname:</label>
            <input name='nickname' type='text' placeholder="Enter nick name">
        </div>
        <div class="form-inline">
            <label>Email:</label>
            <input name='email' type='text' placeholder="Enter email">
        </div>
        <div class="form-inline">
            <label>Avatar:</label>
            <div style="width: 140px; height: 175px; overflow: auto; border: solid 1px #DDDDDD">
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
        <div class="form-inline">
            <label>Phone Code:</label>
            <input name='phone_code' type='text' placeholder="Enter phone code">
        </div>
        <div class="form-inline">
            <label>Phone:</label>
            <input name='phone' type='text' placeholder="Enter phone number">
        </div>
        <div class="form-inline">
            <label>First Name:</label>
            <input name='first_name' type='text' placeholder="Enter first name">
        </div>
        <div class="form-inline">
            <label>Last Name:</label>
            <input name='last_name' type='text' placeholder="Enter last name">
        </div>
        <div class="form-inline">
            <label>Gender:</label>
            <label style='font-weight: normal; width: 120px;'> <input type="radio" name="gender" class="icheck" value="Male" checked=""> Male</label>
            <label style='font-weight: normal; width: 120px;'> <input type="radio" name="gender" class="icheck" value="Female"> Female</label>
        </div>
        <hr/>
        <div class="form-inline">
            <label>IP:</label>
            <?php
            $info = file_get_contents('http://ipinfo.io/json');
            $info = json_decode($info);
            ?>
            <input name='ip' type='text' value='{{ $info->ip }}' disabled="">
        </div>
        <div class="form-inline">
            <label>Country:</label>
            <input name='country' type='text' value='{{ $info->country }}' disabled="" style='width: 50%; margin-right: 15px;'>
            <img src="http://shorter.in/flag.php">
        </div>
        <div class="form-inline">
            <label>City:</label>
            <input name='city' type='text' value='{{ $info->city }}' disabled="">
        </div>
        <div class="form-inline">
            <label>State:</label>
            <input name='state' type='text' placeholder="Enter state">
        </div>
        <div class="form-inline">
            <label>Street Address:</label>
            <input name='street_address' type='text' placeholder="Enter street address">
        </div>
        <div class="form-inline">
            <label>Zip Code:</label>
            <input name='zip_code' type='text' placeholder="Enter zip code">
        </div>
        <div class="form-inline">
            <label>Bonus Code:</label>
            <input name='bonus_code' type='text' placeholder="Enter bonus code">
        </div>
        <div class="form-inline">
            <label>How do you know about us?</label>
            <textarea name='answer' cols="38" rows="5" placeholder='Enter your answer'></textarea>
        </div>
        <div class="btn-group">
            <input name='submit' type='submit' class='btn-primary' value='Sign in' style="width: 100%;">
        </div>
    </form>
</section>
@stop