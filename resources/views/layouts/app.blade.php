
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Biblioteca') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-default" style="background-color:#3097d1">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="{{route('lista')}}">Biblioteca</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                @if (Auth::check() && Auth::user()->isAdmin())
                  <li class="{{(route::is('admin.prestamos')||route::is('admin.prestamos.vencidos'))?'active':''}}"><a href="{{route('admin.prestamos') }}">Prestamos</a></li>
                  {{-- <li class="{{route::is('book.create')?'active':''}}"><a href="{{route('book.create') }}">Agregar Nuevo</a></li> --}}
                  @else
                      <li class="{{Request::is('prestamos')?'active':''}}"><a href="{{route('prestamos') }}">Prestamos</a></li>
                @endif
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorías <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li class="{{route::is('lista')?'active':''}}"><a href="{{ route('lista') }}">Todas</a></li>
                      <li role="separator" class="divider"></li>
                      <li class="{{Request::is('libros')?'active':''}}"><a href="{{ route('listaLibros') }}">Libros</a></li>
                      <li class="{{Request::is('revistas')?'active':''}}"><a href="{{ route('listaRevistas') }}">Revistas</a></li>
                      <li class="{{Request::is('tesis')?'active':''}}"><a href="{{ route('listaTesis') }}">Tesis</a></li>
                      <li class="{{Request::is('actas')?'active':''}}"><a href="{{ route('listaActas') }}">Actas</a></li>
                    </ul>
                  </li>
                </ul>

                {{-- Formulario de busqueda --}}

                <form class="navbar-form navbar-left" method="GET" action="{{ route('busqueda') }}">
                 

                  <div class="form-group">
                    <input name="palabra"type="text" class="form-control" placeholder="Titulo,Autor o Año">
                  </div>
                  
                  <button type="submit" class="btn btn-default btn-blue">Buscar</button>
                <a class="btn btn-default btn-blue" href="{{route('busquedaAvanzada')}}" role="button">Busqueda Avanzada</a>
                </form>
                 <!-- Right Side Of Navbar -->
                 <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Ingresar</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

        @yield('content')
          @extends('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/nav.js') }}"></script> --}}
</body>
</html>


