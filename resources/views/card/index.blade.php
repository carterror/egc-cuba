@extends('layouts.master')

@section('title')
    Card
@endsection

@section('content')

    <div class="row">
        <div class="col s12 m4" >
            <img class="materialboxed z-depth-2" style="border-radius: 5px;" width="100%" height="300px;" src="{{asset('uploads/'.$card->path)}}">
        </div>
        <div class="col s12 m7" style="word-break: break-all; hyphens: auto;">
            <h2 style="margin: 10px !important;"> {{$card->name}}</h2>
            <div style="width: 100px; height: 5px; background-color: #01589bcc; margin: 10px;"></div>
            <p style="padding-left: 10px;"> {!!$card->description!!}</p>
        </div>
    </div>

    <div class="row" style="">
      <form action="{{route('buy.card', $card->id)}}" method="POST">
        @csrf
        <div class="col s12 m6 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b;">
                        <div class="input-field col s6 selecto" style="margin-top: 20px;" >
                            <select name="valor" id="valor" onchange="change()" >
                              {{-- <option value="{{$card->price}}">{{$card->price}}</option> --}}
                              @foreach ($valor as $v)
                                <option value="{{$v}}">{{$v}}</option>
                              @endforeach
                            </select>
                            <label style="font-size: 20px;">Valor:</label>
                          </div>
      
                    {{-- <input type="text" value="{{$card->price}}" class="validate"   style="font-size: 30px; font-weight: bold;"> --}}               
                  <div class="input-field col s6" style="font-size: 30px; font-weight: bold;">
                    USD
                  </div>
        </div>
        @if ($card->name == "Steam") 
            <div class="col s12 m6 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b; @if ($card->name != "Steam" ) display: none; @endif">
              <div class="input-field col s6" style="margin-top: 30px;">
                <input type="text" value="5" class="validate" id="vb" disabled style="font-size: 30px; font-weight: bold; color: black;">
                <label for="icon_prefix" style="font-size: 20px;">Steam</label>
              </div>
              <div class="input-field col s6" style="font-size: 30px; font-weight: bold;">
                Saldo
              </div>
            </div>
        @elseif ($card->name == "Blizzard")
            <div class="col s12 m6 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b; @if ($card->name != "Blizzard" ) display: none; @endif">
              <div class="input-field col s6" style="margin-top: 30px;">
                <input type="text" value="20" class="validate" id="vb" disabled style="font-size: 30px; font-weight: bold; color: black;">
                <label for="icon_prefix" style="font-size: 20px;">Blizzard</label>
              </div>
              <div class="input-field col s6" style="font-size: 30px; font-weight: bold;">
                Saldo
              </div>
            </div>
        @else
            <div class="col s12 m6 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b; @if ($card->name != "Fortnite PaVos" ) display: none; @endif">
                  <div class="input-field col s6" style="margin-top: 30px;">
                    <input type="text" value="1000" class="validate" id="vb" disabled style="font-size: 30px; font-weight: bold; color: black;">
                    <label for="icon_prefix" style="font-size: 20px;">Fortnite</label>
                  </div>
                  <div class="input-field col s6" style="font-size: 30px; font-weight: bold;">
                    PaVos
                  </div>
            </div>
        @endif

      
    </div>
    <div class="row justify-center">
        <div class="col s12 m6 grey lighten-5 z-depth-2" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b;">
            <div class="input-field col s6" style="margin-top: 20px;">
                <input type="text" value="{{$card->price*Config::get('tienda.cup', 50)}}" class="validate" id="cup" disabled style="font-size: 30px; font-weight: bold; color: black;">
                <label for="icon_prefix" style="font-size: 20px;">CUP</label>
              </div>
              <div class="input-field col s6" >
                  <input class="with-gap" name="currency" value="cup" type="radio" id="test5" />
                  <label for="test5" style="font-size: 30px; font-weight: bold;">CUP</label>
              </div> 
        </div>
        <div class="col s12 m6 grey lighten-5 z-depth-2" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b;">
            <div class="input-field col s6" style="margin-top: 20px;">
                <input type="text" value="{{$card->price*Config::get('tienda.mlc', 0.86)}}" class="validate" id="mlc" disabled style="font-size: 30px; font-weight: bold; color: black;">
                <label for="icon_prefix" style="font-size: 20px;">MLC</label>
              </div>
              <div class="input-field col s6" >
                  <input class="with-gap" name="currency" value="mlc" type="radio" id="test4" />
                  <label for="test4" style="font-size: 30px; font-weight: bold;">MLC</label>
              </div> 
        </div>

        <div class="col s12 m6 offset-m3 grey lighten-5 z-depth-2" style="border-radius: 5px; padding: 15px; border-left: 5px solid #01579b;">
          <div class="input-field col s6" style="margin-top: 20px;">
              <input type="text" value="{{$card->price*100}}" class="validate" id="punt" disabled style="font-size: 30px; font-weight: bold; color: black;">
              <label for="icon_prefix" style="font-size: 20px;">PUNTOS</label>
            </div>
            <div class="input-field col s6" >
                <input class="with-gap" name="currency" value="punt" type="radio" id="test3" />
                <label for="test3" style="font-size: 30px; font-weight: bold;">PTS</label>
            </div> 
      </div>

    </div>
    <div class="row">
      <div class="col s12 right-align" style="border-radius: 5px; margin-top: 15px;">
            <h5>Tus puntos: {{Auth::user()->puntos ?? ''}}</h5>
            <button type="submit" style="display: inline; float: right;" max-value="2" class="waves-effect waves-light btn grey-text text-lighten-5 light-blue darken-4">$ Encargar</button>
        </form>
    </div>
    </div>

    <script>
        const valor = document.querySelector("#valor");
        const cup = {!! Config::get('tienda.cup', 50) !!};
        const mlc = {!! Config::get('tienda.mlc', 0.86) !!};
        const tar = '{{$card->name}}'; 

        console.log(tar)

        function change() {
            var preciocup = document.getElementById("cup");
            var preciomlc = document.getElementById("mlc");
            var preciopunt = document.getElementById("punt");
            var vb = document.getElementById("vb");

            preciocup.value = valor.value*cup;
            preciomlc.value = Math.round((valor.value*mlc)*100)/100;
            preciopunt.value = valor.value*100;

            if (tar == "Blizzard") {
              if (valor.value <= 40 ) {
                vb.value = 20;
              } else if(valor.value <= 60) {
                vb.value = 50;
              } else if(valor.value >= 90 && valor.value < 150) {
                vb.value = 100;
              } else {
                vb.value = "...";
              }
            } else if (tar == "Steam") {
              if (valor.value <= 10 ) {
                vb.value = 5;
              } else if(valor.value <= 19) {
                vb.value = 10;
              } else if(valor.value <= 29) {
                vb.value = 20;
              } else if(valor.value <= 49) {
                vb.value = 30;
              } else if(valor.value <= 69) {
                vb.value = 50;
              } else if(valor.value >= 90 && valor.value < 150) {
                vb.value = 100;
              } else {
                vb.value = "...";
              }
            } else {
              if (valor.value <= 20 ) {
                vb.value = 1000;
              } else if(valor.value <= 30) {
                vb.value = 2800;
              } else if(valor.value < 80) {
                vb.value = 5000;
              } else if(valor.value >= 75 && valor.value < 100) {
                vb.value = 13500;
              } else {
                vb.value = "...";
              }
            }


        } 
      </script>

      <script>
        
      </script>
@endsection
