<?php

class HomeController extends BaseController {

    public function __construct()
    {
        View::share('title', 'Poker');
        View::share('assets', asset('assets'));
    }

    public function get_index()
    {
        return View::make('home.index');
    }

    public function get_login()
    {
        return View::make('home.login');
    }

    public function post_login()
    {
        //Validation
        $rules = array(
            'username' => 'required|alpha_dash',
            'password' => 'required|alpha_num|min:6',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('home/login')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password'),
            );

            if (Auth::attempt($userdata)) {
                Session::flash('login_message', 'Login successfully!');
                return Redirect::to('home/index');
            } else {
                Session::flash('login_message', 'Incorrect username or password');
                return Redirect::to('home/login');
            }
        }
    }

    public function get_logout()
    {
        Auth::logout();
        Session::flash('logout_message', 'Sign out successfully');
        return Redirect::to('home/index');
    }

    public function get_register()
    {
        return View::make('home.register');
    }

    public function post_register()
    {
        $register_rules = array(
            'username' => 'required|alpha_dash|between:3,12|unique:users,username',
            'password' => 'required|alpha_dash|min:6|confirmed',
            'nickname' => 'alpha_dash|max:15',
            'email' => 'required|email|unique:users,email|max:80',
            'phone_code' => 'required|max:10',
            'phone' => 'required|max:20',
            'real_name' => 'required|max:25',
        );
        $validator = Validator::make(Input::all(), $register_rules);
        
        if ($validator->fails()) {
            return Redirect::to('home/register')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        } else {
            $user = new User;
            $inputs = Input::except('password', 'password_confirmation', '_token');
            foreach ($inputs as $key => $value) {
                $user->$key = $value;
            }
            $user->password = Hash::make(Input::get('password'));
            
            $user_api = Input::only('username', 'nickname', 'real_name', 'password', 'city', 'email', 'avatar', 'gender');
            $rs = Api::add_account($user_api);
            if($rs->Result != 'Error') {
                $user->save();
                Session::flash('register_message', 'Successfully register!');
                return Redirect::to('/');
            } else {
                Session::flash('register_message', $rs->Error);
                return Redirect::to('home/register')->withInput(Input::except('password'));
            }
        }
        
    }

}
