@extends('layouts.master')

@section('content')

    <p>Don't have an account? <a href='/register'>Register here...</a></p>

    <h1>Login</h1>

    @include('layouts.errors')

    <form method='POST' action='/login'>

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='email'>* Email:</label>
            <input type='text' name='email' id='email' value='{{ old('email','jill@harvard.edu') }}'>
        </div>

        <div class='form-group'>
            <label for='password'>* Password:</label>
            <input type='password' name='password' id='password' value='{{ old('password','helloworld') }}'>
        </div>

        <div class='form-group'>
            <input type='checkbox' name='remember' id='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

        <div class="g-recaptcha" data-sitekey="6LcJ9xITAAAAAI-CjpGNsmPzuYqA43-X910RTPp4"></div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>
@stop

@section('body')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop
