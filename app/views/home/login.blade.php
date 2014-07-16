@extends('layout.master')

@section('content')
<section id='login-form'>
    <h1>Login</h1>
    <form action="" method='POST'>
        <input name='username' type='text' placeholder="Enter username">
        <input name='password' type='password' placeholder='Enter password'>
        <div class="btn-wrapper">
            <input name='submit' type='submit' value='Sign in'>
            <a href="{{ URL::to('home/register') }}" class="btn-primary" style="float: right;">Sign up</a>
            <!--<input name='register' type='submit' value='Sign up' >-->
        </div>
    </form>
</section>
@stop

