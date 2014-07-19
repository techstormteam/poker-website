@extends('layout.master02')

@section('script')
<script src='{{ $assets }}/uikit/js/addons/notify.min.js' type="text/javascript"></script>

@if(!empty(Session::get('login_message')))
    <script type='text/javascript'>
        $.UIkit.notify("{{ Session::get('login_message') }}", {status:'danger'});
    </script>
@endif

@stop

@section('content')
<section id='login-form'>
    {{ Form::open(array('url' => 'home/login')) }}
    {{ HTML::ul($errors->all()) }}
    <h1>Login</h1>
    {{ Form::text('username', Input::old('username'), array('placeholder' => 'Enter username')) }}
    {{ Form::password('password') }}
    <!--<input name='username' type='text' placeholder="Enter username">-->
    <!--<input name='password' type='password' placeholder='Enter password'>-->
    <div class="btn-wrapper">
        {{ Form::submit('Login') }}
        <!--<input name='submit' type='submit' value='Sign in'>-->
        <a href="{{ URL::to('home/register') }}" class="btn-primary" style="float: right;">Sign up</a>
        <!--<input name='register' type='submit' value='Sign up' >-->
    </div>
    {{ Form::close() }}
</section>
@stop

