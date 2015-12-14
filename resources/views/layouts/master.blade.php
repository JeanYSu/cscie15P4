<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'OneNaughtyKid' --}}
        @yield('title','P4 - OneNaughtyKid')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>

    <link href='/css/global.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    @if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <header>
        <a href='/'>
        <img
        src='/img/logo.png'
        style='width:100px'
        alt='Banner'>
        </a>
    </header>

    <div class="container">
        <ul class="nav nav-pills nav-justified">
            @if(Auth::check())
                <li @yield('homemenu')><a href='/'>Home</a></li>
                <li @yield('addkidmenu')><a href='/kids/add'>Add a kid</a></li>
                <li @yield('addphotomenu')><a href='/photos/add'>Add a photo</a></li>
                <li><a href='/logout'>Log out {{ Auth::user()->name }}</a></li>
            @else
                <li @yield('homemenu') ><a href='/'>Home</a></li>
                <li @yield('loginmenu')><a href='/login'>Log in</a></li>
                <li @yield('registermenu')><a href='/register'>Register</a></li>
            @endif
        </ul>
    </div>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        CSCI E-15 Project 4 | Autho: Jean Su | Copyright &copy; {{ date('Y') }} &nbsp;&nbsp;
    </footer>



    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
