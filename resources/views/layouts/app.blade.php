<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Takocil</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/mypage.css') }}">
        
        @if (!\Auth::check() and Request::path() == "/")
        <link rel="stylesheet" href="{{ secure_asset('css/welcome.css') }}">
        @endif
        @if (!\Auth::check() and Request::path() == "signup")
        <link rel="stylesheet" href="{{ secure_asset('css/signup.css') }}">
        @endif
        @if (!\Auth::check() and Request::path() == "login")
        <link rel="stylesheet" href="{{ secure_asset('css/login.css') }}">
        @endif
        
        
    </head>
    
@if (\Auth::check())
<div class="mainframe timeline_background">
@endif
@if (!\Auth::check() and Request::path() == "/")
<div class="mainframe background">
@endif
@if (!\Auth::check() and Request::path() == "signup")
<div class="signback">
@endif
@if (!\Auth::check() and Request::path() == "login")
<div class="logback">
@endif


<body>
@if (\Auth::check())
@include('commons.navbar')
@endif
    <div id='wrapper'>
        <div class="container">
            @include('commons.error_messages')

            @yield('content')
        </div>
        <footer>
                <small>&copy; 2018 A BANANA.</small>
        </footer>
    </div>    
</body>
</div> 
</html>