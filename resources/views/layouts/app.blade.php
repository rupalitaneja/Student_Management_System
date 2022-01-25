<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .navbar-nav>li>a {
    padding-top: 14px;
    padding-bottom: 14px;
    margin-top: -390%;
    margin-right: 10%;
    width: 100%;
}
.navbar-nav>li>.dropdown-menu {
    margin-top: -280;
    border-top-right-radius: 0;
    border-top-left-radius: 0;
}
.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
    white-space: nowrap;
    padding-top: 14px;
    padding-bottom: 14px;
    margin-top: -300%;
}
    .dropdown{
        position: relative;
    display: block;
    /* background-color: #054f76; */
    color: aliceblue;
}.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color:#858b92;
    border-color: #d7eefe;
    background-color: #31708f;
    color: aliceblue;
    
}
.open>.dropdown-menu {
    display: block;
    background-color: #858b92;
}

    }
    .container2{
        width: 300px; 
        margin-left: 0%;
        margin-top: -42%;
    }
</style>
<body>
    <div id="app">
        
            <div class="container2">
                <div class="navbar-header">
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
        
                            
                        @endif
                    </ul>
                </div>
            </div>
        

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
