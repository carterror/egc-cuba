<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <link rel="icon" href="{{ asset('dist/logo.png') }}" sizes="32x32">
  <title>{{ config('app.name', 'Tienda') }} @yield('title')</title>

  <!-- Fonts -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

  <!-- Styles -->
  
  <link rel="stylesheet" href="{{ asset('dist/css/materialize.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('dist/app.css') }}"> --}}
  <style>
    .selecto .select-wrapper input.select-dropdown {
      font-size: 30px; 
      font-weight: bold;
      margin-top: 10px;
     }
  </style>
</head>
<body>
  <div class="navbar-fixed">
  <nav class="blue-grey darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">EGC-Cuba</a>
      <ul class="right hide-on-med-and-down">
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard/all') }}" ><i class="mdi-action-home left"></i>Inicio</a></li>
               <ul id="dropdown1" class="dropdown-content blue-grey darken-4">
                  <li><a class="disabled">{{ Auth::user()->name }}</a></li>
                  <li class="divider"></li>
                  <li><a href="{{route('info')}}">Información</a></li>
                  <li><a href="{{route('refer')}}">Referidos</a></li>
                  @if (Auth::user()->type == 1)
                    <li class="divider"></li>
                    <li><a href="{{route('admin')}}">Administrar</a></li>
                  @endif
                  <li class="divider"></li>
                  <form method="POST" action="{{ route('logout') }}">
                  <li>
                      @csrf
                      <a :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </a>
                  </li>
                  </form>
                </ul>
                <li style="@if(Auth::user()->rango >= 20) background-color: #B9F2FF; backdrop-filter: blur(5); @elseif(Auth::user()->rango >= 10) background-color: #FFD700; @elseif(Auth::user()->rango >= 5) background-color: #E3E4E5; @elseif(Auth::user()->rango >= 1) background-color: #CD7F32; @endif "><a class="dropdown-button @if(Auth::user()->rango > 1) blue-grey-text text-darken-4 @endif " href="" data-activates="dropdown1"><i class="mdi-action-account-circle left"></i><b>{{ Auth::user()->name }}</b><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
                @else
                <li><a href="{{ route('login') }}" ><i class="mdi-action-account-circle left"></i>Ingresar</a></li>
      
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}" ><i class="mdi-action-assignment-ind left"></i>Registrarse</a></li>
                @endif
            @endauth
      @endif
      </ul>

      <ul id="nav-mobile" class="side-nav blue-grey darken-4" style="opacity: .9;">
        <li><a id="logo-container" href="#">Logo</a></li>
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard') }}" >Inicio</a></li>
                <li> <a href="{{ route('register') }}" ><i class="mdi-action-assignment-ind left"></i>Registrarse</a></li>
            @else
            <li><a href="{{ route('login') }}" ><i class="mdi-action-account-circle left"></i>Ingresar</a></li>
      
                @if (Route::has('register'))
                <li> <a href="{{ route('register') }}" ><i class="mdi-action-assignment-ind left"></i>Registrarse</a></li>
                @endif
            @endauth
      @endif
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
  </div>
  <div id="index-banner" class="parallax-container" style="padding-top: 50px;">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Electronic Gift Card</h1>
        <div class="row center">
          <h5 class="header col s12 light" style="background-color: rgba(0, 0, 0, 0.685); border-radius: 5px; padding: 10px;">Tarjeta de regalo o gift card puede describirse como una especie de tarjeta de débito o crédito precargada que le posibilita al titular de la misma poder adquirir una serie de bienes o servicios. </h5>
        </div>
        {{-- <div class="row center">
          <a href="" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
        </div> --}}
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{asset('img/banner2.jpg')}}" alt="Unsplashed background img 2"></div>
  </div>
  <div class="row">
    <div class="container">
        <div class="section">

      <!--   Icon Section   -->
      
      @section('content') 
      @show
      

    </div>
  </div>
</div>
 
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light" style="background-color: rgba(0, 0, 0, 0.685); border-radius: 5px; padding: 10px;">Trata de una tarjeta que contiene una cierta cantidad de dinero, emitida por un distribuidor dado o entidad para que pueda ser utilizada como alternativa de compra y para que esta, si se desea, sea regalada. Estas tarjetas de regalo solo pueden ser utilizadas en sus propias plataformas</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{asset('img/parallax.png')}}" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer blue-grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Contacto</h5>
          <p class="grey-text text-lighten-4">{{Config::get('tienda.phone', null)}}</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Enlaces de interes</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Redes Sociales</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-4" >
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="">+++CT3rroR+++</a>
      </div>
    </div>
  </footer>

<a class="back-to-top btn-floating btn-large waves-effect waves-light"><i class="mdi-navigation-expand-less"></i></a>

    <!-- Scripts -->
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/materialize.js') }}"></script>
    <script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/clipboard.min.js') }}"></script>

    @include('components.auth-validation-errors')
  </body>
</html>
