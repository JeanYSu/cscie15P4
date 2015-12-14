@extends('layouts.master')

@section('homemenu')

@stop
@section('loginmenu')
    class="active"
@stop
@section('registermenu')

@stop

@section('content')

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1692496040972554',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
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
        <a class="btn btn-primary" href="{{ action('Auth\SocialController@redirectToProvider') }}">
            <span class="glyphicon glyphicon-thumbs-up"></span> Login with Facebook</a>
    </form>
@stop

@section('body')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop
