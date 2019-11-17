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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style type="text/css">
    html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
    }
 
    #full-screen-background-image {
        margin-top: 3%;
        opacity: 0.7;
        width: 100%;
        height: 95%;
        top: 0;
        left: 0;
        position: fixed;
        repeat: no-repeat;
    }
    label{
        font-weight: bold;
    }
    th{
        font-weight: bold;
    }
    td{
        font-weight: bold;
    }
    p{
        font-weight: bold;
    }
</style>
<body>
    <img alt="full screen background image" src="{{ asset('images/fondo.jpg') }}" id="full-screen-background-image" />
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#575D73;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#FFFFFF">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:#FFFFFF">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="nav-option" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#FFFFFF">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-option" style="background-color:#575D73;">
                                    <a class="dropdown-item" href="{{ route('home') }}" style="color:#FFFFFF">
                                        {{ __('Inicio') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" style="color:#FFFFFF">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
<script>
    function mayus(letra) {
        letra.value = letra.value.toUpperCase();
    }
    function modal(){
        $('#editar_articulo').modal({
            keyboard: true,
            backdrop: "static",
            show:false,
        }).on('show', function(){
              var getIdFromRow = $(event.target).closest('tr').data('id');
            //make your ajax call populate items or what even you need
            $(this).find('#articulo').html($(getIdFromRow))
        });
    }
</script>
</html>
