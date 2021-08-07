@extends('layouts.master')

@section('title')
    Inicio
@endsection

@section('content')

          <div class="row">
          
            <div class="col s12">
              <nav class="blue-grey darken-4">
                <div class="nav-wrapper">
                  <form method="POST" action="{{route('buscar')}}">
                    @csrf
                    <div class="input-field">
                      <input id="search" type="search" name="buscar" style="height: 64px;" required>
                      <label for="search"><i class="mdi-action-search"></i></label>
                      <i class="mdi-navigation-close"></i>
                    </div>
                  </form>
                </div>
              </nav>
    
            </div>
          </div>

        @if (!$conteo)
            <h2 class="red-text text-accent-3">NO SE ENCUENTRAN TARJETAS!!! <br> "{{$id}}"</h2>
        @else
        @if ($id!="all")
            <h3 class="red-text text-accent-3">Resultados de buscar: "{{$id}}"</h3>
        @endif
          @foreach ($cards as $card)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light ">
                    <a href="{{route('card', $card->id)}}"><img class="activator" src="{{asset('img/'.$card->type.'.png')}}"></a>
                    <div class="" style="position: absolute; bottom: 1px; right: 1px; padding: 10px; font-weight: bold; background-color: rgba(255, 255, 255, 0.699);">$ {{$card->price}} - {{$card->top}}</div>
                    </div>
                    <div class="card-content" style="padding: 0px 0px 0px 10px;">
                        <span class="card-title bold grey-text text-darken-4">{{$card->name}}</span>
                    </div>
                    <div class="card-action right-align" style="padding: 10px;">
                    @if (Route::has('login'))
                    @auth
                    {{-- <a style="color: #00bfa5;">{{$card->price*Config::get('tienda.cup', 1)}} - {{$card->top*Config::get('tienda.cup', 1)}} cup</a> --}}
                    <a href="{{route('card', $card->id)}}" class="waves-effect waves-light btn grey-text text-lighten-5">Ver</a>
                    @else
                    <a href="{{route('register')}}" class="waves-effect waves-light btn grey-text text-lighten-5">Ingresar</a>
                    @endauth
                    @endif
                    </div>
                </div>
            </div>
          @endforeach
        @endif


  <div class="row">
    <div class="col s12">
      {{ $cards->links() }}
    </div>
  </div>
@endsection
