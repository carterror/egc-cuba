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
            html{
                background: url('{{ asset("img/parallax.png") }}');
            }
        </style>
    </head>
    <body style="background-color: rgba(0, 0, 0, 0.582);">
        
        <div class="container" style="">
            <div class="row" style="margin-top: 100px;">
                <div class="col s6 offset-s3" style="">
                    {{ $slot }}
                 </div> 
             </div>
            </div>

        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <script src="{{ asset('dist/js/materialize.js') }}"></script>
        @include('components.auth-validation-errors')
    </body>
</html>
