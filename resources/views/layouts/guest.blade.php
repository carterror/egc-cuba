<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('dist/css/materialize.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
        <style>
            body{
                background: url('{{ asset("img/parallax.png") }}');
            }
        </style>
    </head>
    <body >
        
        <div class="container" style="background-color: rgba(0, 0, 0, 0.582);">
            <div class="row" style="margin-top: 100px; padding: 0px;">
                <div class="col s10 m6 offset-s1 offset-m3" style="padding: 0px;">
                    {{ $slot }}
                 </div> 
             </div>
            </div>

        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <script src="{{ asset('dist/js/materialize.js') }}"></script>
        <script src="{{ asset('dist/js/init.js') }}"></script>
        <script>

            function verpass(pass) {

                var passa = document.getElementById(pass);
                var icono = document.getElementById(pass+' icono');

                if (passa.type == "text") {
                passa.type="password";
                icono.classList="mdi-image-remove-red-eye prefix tooltipped";
                } else {
                passa.type="text";
                icono.classList="mdi-image-panorama-fisheye prefix tooltipped";
                }
            
            }
        </script>
        @include('components.auth-validation-errors')
    </body>
</html>
