<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE-edge"/>
  <meta name="author" content="3rroR" />
  <meta name="description" content="Página para encargar tarjetas de regalo" />
  <meta name="keywords" content="tarjeta, vender, regalo, referido, encargo" />
  <meta name="copyright" content="egc-cuba.com" />
  <meta name="robots" content="index, follow">

  <meta name="theme-color" content="#01579b">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="mobile-web-app-status-bar-style" content="black-translucent">

  <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon_512.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('img/icon_512.png') }}">
  <link rel="touch-icon" href="{{ asset('img/icon_512.png') }}">
  <link rel="apple-touch-startup-image" href="{{ asset('img/icon_512.png') }}">
  <link rel="touch-startup-image" href="{{ asset('img/icon_512.png') }}">
  <link rel="manifest" href="{{ asset('manifest.json') }}">

  <link rel="icon" href="{{ asset('img/icon_512.png') }}" sizes="32x32">
  <title>{{ config('app.name', 'Tienda') }} @yield('title')</title>

  <!-- Fonts -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=OpenSans:wght@400;600;700&display=swap"> --}}

  <!-- Styles -->
  
  <link rel="stylesheet" href="{{ asset('dist/css/materialize.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/jquery.fancybox.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('dist/app.css') }}"> --}}
  <style>

  </style>
</head>
<body class="light-blue lighten-4">
  <div class="navbar-fixed">
  <nav class="light-blue darken-3"  role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="{{route('dashboard')}}" class="brand-logo" style="padding-top: 3px;"><img src="{{asset('img/logo1.png')}}" height="50px" alt="" srcset=""></a>
      <ul class="right hide-on-med-and-down">
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard/all') }}" ><i class="mdi-action-home left"></i>Inicio</a></li>
                <li><a href="{{route('help')}}"><i class="mdi-communication-live-help left"></i>Ayuda</a></li>
               <ul id="dropdown1" class="dropdown-content light-blue darken-3">
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
                <li><a href="{{route('help')}}"><i class="mdi-communication-live-help left"></i>Ayuda</a></li>
                <li><a href="{{ route('login') }}" ><i class="mdi-action-account-circle left"></i>Ingresar</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}" ><i class="mdi-action-assignment-ind left"></i>Registrarse</a></li>
                @endif
            @endauth
      @endif
      </ul>

      <ul id="nav-mobile" class="side-nav light-blue darken-3" style="opacity: .8;">
        <li class="text-center"><a id="logo-container" href="{{ url('/dashboard') }}" style="padding-top: 4px;"><img src="{{asset('img/logo1.png')}}" height="60px" alt="" srcset=""></a></li>
        @if (Route::has('login'))
            @auth
                <li><a href="{{url('/dashboard')}}"><i class="mdi-action-home left"></i>Inicio</a></li>
                <li style="@if(Auth::user()->rango >= 20) background-color: #B9F2FF; backdrop-filter: blur(5); @elseif(Auth::user()->rango >= 10) background-color: #FFD700; @elseif(Auth::user()->rango >= 5) background-color: #E3E4E5; @elseif(Auth::user()->rango >= 1) background-color: #CD7F32; @else background-color: transparent; @endif"><a href="{{url('/dashboard')}}" class="@if(Auth::user()->rango > 1) blue-grey-text text-darken-4 @endif"><i class="mdi-action-account-circle left"></i>{{ Auth::user()->name }}</a></li>
                <li><a href="{{route('info')}}"><i class="mdi-action-perm-contact-cal left"></i>Perfil</a></li>
                <li><a href="{{route('refer')}}"><i class="mdi-action-account-child left"></i>Referidos</a></li>
                <li><a href="{{route('help')}}"><i class="mdi-communication-live-help left"></i>Ayuda</a></li>
                @if (Auth::user()->type == 1)
                  <li><a href="{{route('admin')}}"><i class="mdi-action-account-child left"></i>Administrar</a></li>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                  <li>
                      @csrf
                      <a :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                         <i class="mdi-action-input left"></i> {{ __('Log Out') }}
                      </a>
                  </li>
                  </form>
            @else
              <li><a href="{{route('help')}}"><i class="mdi-communication-live-help left"></i>Ayuda</a></li>
              <li><a href="{{ route('login') }}" ><i class="mdi-action-account-circle left"></i>Ingresar</a></li>
                @if (Route::has('register'))
                <li> <a href="{{ route('register') }}" ><i class="mdi-action-assignment-ind left"></i>Registrarse</a></li>
                @endif
            @endauth
      @endif
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse grey-text text-lighten-5"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
  </div>
    @php
      use Carbon\Carbon;
      $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
      $date = Carbon::parse(Config::get('tienda.hasta', "23:59"));
    @endphp


    @if (Config::get('tienda.cerrada', 1) == 0)
      <h5 class="stado tooltipped center grey-text text-lighten-4 red z-depth-2" data-position="bottom" data-delay="50" data-tooltip="Cerrada, intente más tarde">Tienda Cerrada</h5>
    @elseif (date('Y-m-d H:i:s') < $date)
      <h5 class="stado tooltipped center grey-text text-lighten-4 red z-depth-2" data-position="bottom" data-delay="50" data-tooltip='Cerrada hasta: {{$date->format('d \\d\\e ').$meses[$date->format('m')-1]}} a las {{$date->format('h:i A')}}'>Tienda Cerrada</h5>
    @else
      <h5 class="stado tooltipped center grey-text text-lighten-4 light-blue darken-4 z-depth-2" data-position="bottom" data-delay="50" data-tooltip="Abierta">Tienda Abierta</h5>
    @endif

  <div id="index-banner" class="parallax-container" style="padding-top: 20px;">
    <div class="section no-pad-bot">
      <div class="container">
        
        <h1 class="header center red-text text-darken-4"><br></h1>
        
        <div class="row center">
          <h5 class="header col s12 light" style="background-color: rgba(0, 0, 0, 0.322); text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.863); color: #fff ; font-weight: 400; border-radius: 5px; padding: 10px;">Todas las tarjetas de regalo a su alcance. Te brindamos un sistema para encargar tus tarjetas preferida de forma muy fácil.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{asset('img/banner2.jpg')}}" alt="Tarjetas de regalo"></div>
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
          <h5 class="header col s12 light" style="margin-top: -10px; background-color: rgba(0, 0, 0, 0.322); text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.863); color: #fff ; font-weight: 400;border-radius: 5px; padding: 10px;">Te premiamos con nuestro sistema de <a href="{{route('help')}}" class="red-text text-darken-3">puntuación</a> por cada pedido completado y por cada nuevo usuario <a href="{{url('/help#help')}}" class="red-text text-darken-3">"referido"</a> que unas a nuestra plataforma.</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{asset('img/banner1.jpg')}}" alt="Tarjetas de regalo"></div>
  </div>

  <footer class="page-footer light-blue darken-3 ">
    <div class="container">
      <div class="row">
        <div class="col m4 s12">
          <h5 class="white-text asdasd">Contacto</h5>
          <p class="grey-text text-lighten-4" style="line-height: 1;">Teléfono: <a  href="tel:+{{Config::get('tienda.phone', null)}}" class="red-text text-darken-4">+{{Config::get('tienda.phone', null)}}</a></p>
          <p class="grey-text text-lighten-4" style="line-height: 1;">Correo: <a  href="mailto:soporte@egc-cuba.com" class="red-text text-darken-4">soporte@egc-cuba.com</a></p>


        </div>
        <div class="col m4 s12">
          <h5 class="white-text">Redes Sociales</h5>
          <div class="row">

            <div class="col s6 m12">
              <a class="fancybox-share__button fancybox-share__button--fb" style="display: inline; float: left !important;" href="https://www.facebook.com/EGC-Cuba-100361595704420"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196"></path></svg><span>Facebook</span></a>
            </div>
            <div class="col s6 m12">
              <a class="fancybox-share__button fancybox-share__button--wa" style="display: inline; float: left;" href="https://wa.me/message/GKYEWV4I7PUGF1"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg><span>WhatsApp</span></a>
            </div>
            <div class="col s6 m12">
              <a class="fancybox-share__button fancybox-share__button--tg" style="display: inline; float: left;" href="https://t.me/EGC_Cuba"><svg viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path></svg><span>Telegram</span></a>
            </div>
          </div>

        </div>
        <div class="col m4 s12">
          <h5 class="white-text">Horarios de pedidos:</h5>
          <ul class="white-text">
            <li>Lunes a Jueves:</li>
            <li> 8:00am - 10:00am y 8:00pm - 10:00pm </li>
            <li>Viernes a Sábados:</li>
            <li> 8:00am - 10:00pm</li>
            <li>Domingos: No se responden pedidos.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright light-blue darken-4" >
      <div class="container  grey-text text-lighten-5">
      Desarrollado por <a class="brown-text text-lighten-3" href="https://www.facebook.com/carlosbrayan.ramilachorens.5/">+++CT3rroR+++</a>
      </div>
    </div>
  </footer>

<a class="back-to-top btn-floating light-blue darken-4 btn-large waves-effect waves-light" id="back-to-top"><i class="mdi-navigation-expand-less"></i></a>

<!-- Modal Structure -->
<div id="modalBono" class="modal pink-text text-accent-2 grey darken-3">
  <div class="modal-content">
    <h4>Oferta especial:</h4>
    <h6>{{Config::get('tienda.descript', null)}}</h6>
  </div>
  <div class="modal-footer pink-text text-accent-2 grey darken-3">
    <a href="#!" class="modal-action modal-close waves-effect waves-pink btn-flat pink-text text-accent-2">Entendido!</a>
  </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/materialize.js') }}"></script>
    <script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/clipboard.min.js') }}"></script>
    
    <script>
    window.onload = () => {
      'use strict';

      if ('serviceWorker' in navigator) {
          navigator.serviceWorker.register('{{ asset("sw.js") }}')
            .then(reg => console.log('Registro de SW exitoso', reg))
            .catch(err => console.warn('Error al tratar de registrar el sw', err))
      }
    }
    </script>
    @include('components.auth-validation-errors')
  </body>
</html>
