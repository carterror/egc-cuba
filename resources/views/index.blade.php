@extends('layouts.master')

@section('title')
    Inicio
@endsection

@section('content')

          <div class="row">
          
            <div class="col s12">
              <nav class="light-blue darken-4">
                <div class="nav-wrapper">
                  <form method="POST" action="{{route('buscar')}}">
                    @csrf
                    <div class="input-field">
                      <input id="search" type="search" name="buscar" style="height: 64px;" list="datali" required>
                      <datalist id="datali">
                        @foreach ($cards as $card)
                          <option value="{{$card->name}}">
                        @endforeach
                      </datalist>
                      <label for="search" style="left: 15px;"><i class="mdi-action-search light-blue-text text-lighten-3"></i></label>
                    </div>
                  </form>
                </div>
              </nav>
    
            </div>
          </div>

        @if (!$conteo)
            <h5 class="light-blue-text text-darken-4">No se encontraron coincidencias!!! <br> "{{$id}}"</h5>
        @else
        @if ($id!="all")
            <h5 class="light-blue-text text-darken-4">Resultados de buscar: "{{$id}}"</h5>
        @endif
          @foreach ($cards as $card)
            <div class="col s6 m4 l3">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-image waves-effect waves-block waves-light ">
                    <a href="{{route('card', $card->id)}}"><img class="activator" src="{{asset('uploads/'.$card->path)}}"></a>
                    <div class="" style="position: absolute; bottom: 1px; right: 1px; padding: 10px; font-weight: bold; background-color: rgba(255, 255, 255, 0.699);">$ {{$card->price}} - {{$card->top}}</div>
                    </div>
                    <div class="card-content" style="padding: 0px 0px 0px 10px;">
                        <span class="card-title bold grey-text text-darken-4" style="font-size: 16px; font-weight: 400; line-height: 2;">{{ substr($card->name, 0, 12)}}</span>
                    </div>
                    <div class="card-action right-align" style="padding: 10px;">
                    @if (Route::has('login'))
                    @auth
                    {{-- <a style="color: #00bfa5;">{{$card->price*Config::get('tienda.cup', 1)}} - {{$card->top*Config::get('tienda.cup', 1)}} cup</a> --}}
                    <a href="{{route('card', $card->id)}}" class="waves-effect waves-light btn grey-text text-lighten-5 light-blue darken-4">Ver</a>
                    @else
                    <a href="{{route('register')}}" class="waves-effect waves-light btn grey-text text-lighten-5 light-blue darken-4">Entrar</a>
                    @endauth
                    @endif
                    </div>
                </div>
            </div>
          @endforeach
        @endif


  <div class="row">
    <div class="col s12">
      {{ $cards->links('vendor.pagination.materiallize') }}
    </div>
  </div>
  <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      var bono = '{{Config::get('tienda.descript', '')}}';
      if (bono == '') {
        $('#modalBono').closeModal();
      } else {
        Materialize.toast('<i class="mdi-action-wallet-giftcard small pink-text text-accent-2" style="margin-right: 5px;"></i> <h5 class="pink-text text-accent-2">Recuerde<button data-target="modalBono" class="btn modal-trigger pink accent-2 grey-text text-darken-3" style="font-size: medium; font-weight: bold;">Oferta</button> </h5>', 5000);
      }
      
    });
  
</script>
@endsection
