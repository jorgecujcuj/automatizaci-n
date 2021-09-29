<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-center">
                        <!-- Lado izquierdo de la barra de navegación -->
                        <li class="nav-item active">
                            <a class="nav-link text-light bg-info" style="border-radius:25px; margin-right: 15px;" href="{{ url('imgs') }}">{{ __('  Ruta  ') }}<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="navbar-nav text-center">
                        <li class="nav-item active">
                        <a class="nav-link text-light bg-info" style="border-radius:25px; margin-right: 15px;" href="{{ url('/') }}">{{ __('  Eventos  ') }}<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                    @if(Auth::check())
                    <div class="dropdown-divider"></div>
                    <ul class="navbar-nav text-center">
                        <li class="nav-item active">
                            <a class="nav-link text-light bg-info" style="border-radius:25px; margin-right: 15px;" href="{{ url('tableros') }}">{{ __('  Tablero  ') }}<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    @endif


                    <!-- Right Side Of Navbar -->
                    <div class="dropdown-divider"></div>
                    <ul class="navbar-nav text-center">
                      <!--   Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light bg-info" style="border-radius:25px; margin-right: 15px;" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                                </li>
                            @endif
                            <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-light bg-info" style="border-radius:25px; margin-right: 15px;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
