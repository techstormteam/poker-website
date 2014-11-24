@extends('layout.bootstrap')

@section('script')

@if(!empty(Session::get('login_message')))
<script type='text/javascript'>
        $.UIkit.notify("{{ Session::get('login_message') }}", {status: 'danger'});
</script>
@endif

@stop

@section('content')
<section id='login-form' class="box-register ts-box center-block">
    {{ Form::open(array('url' => 'home/login', 'class' => 'form-horizontal')) }}
    {{ HTML::ul($errors->all()) }}
    <fieldset>
        <legend>
            <h1 class="text-center center-block">Login</h1>
        </legend>
        <div class="form-group">
            {{ Form::label('username', 'Username', array('class' => 'col-xs-3')) }}
            <div class="col-xs-9">
                {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Enter username')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password', array('class' => 'col-xs-3')) }}
            <div class="col-xs-9">
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>
        </div>
            <div class="btn-group col-xs-offset-4">
                {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
                <a href="{{ URL::to('home/register') }}" class="btn btn-danger">Sign up</a>
            </div>
    </fieldset>
    {{ Form::close() }}
</section>
@stop

