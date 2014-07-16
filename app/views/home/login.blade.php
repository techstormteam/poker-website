@extends('layout.master')

@section('content')
<section id='login-form'>
    <h1>Login</h1>
    <form action="" method='POST'>
        <input name='username' type='text' placeholder="Enter username">
        <input name='password' type='password' placeholder='Enter password'>
        <input name='submit' type='submit' value='Sign in'>
    </form>
</section>
@stop

