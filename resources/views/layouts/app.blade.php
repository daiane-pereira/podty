<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    @yield('head')

</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/podcast-logo-blue.png" id="brand-img" height="40">
                    PodVille
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Episodes</a></li>
                    <li><a href="{{ url('/home') }}">About</a></li>
                    <li class="toggle-color"><a style="cursor: pointer;">toggle color</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-cog"></i>Settings</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>

    @yield('footer')

</body>
</html>
