<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="{{asset("css/font-awesome.css")}}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (!Auth::guest())
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Klijent
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{action('ClientController@showCreateForm')}}">Novi</a></li>
                                <li><a href="{{action('ClientController@index')}}">Lista</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Uređaj
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ action('DeviceController@showCreateForm') }}">Novi</a></li>
                                <li><a href="{{ action('DeviceController@index') }}">Lista</a></li>
                            </ul>
                        </li>
                    </ul>


                    <form action="{{action('DeviceController@index')}}" method="get" class="navbar-form navbar-left">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                       value="{{ request()->get('search', null) }}"
                                       placeholder="Pretraži po SN..">
                                <span class="input-group-btn">
				                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
			                        </span>
                            </div>
                        </div>
                    </form>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
@yield('javascript')
<script src="/js/app.js"></script>
</body>
</html>
