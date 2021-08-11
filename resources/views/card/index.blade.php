@extends('layouts.master')

@section('title')
    Card
@endsection

@section('content')

    <div class="row">
        <div class="col s12 m4" >
            <img class="materialboxed z-depth-2" style="border-radius: 5px;" width="100%" height="300px;" src="{{asset('img/'.$card->type.'.png')}}">
        </div>
        <div class="col s12 m7" >
            <h2 style="margin: 10px !important;"> {{$card->name}}</h2>
            <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 10px;"></div>
            <h6 style="padding: 10px;"> {{$card->description}}</h6>
            <p style="padding: 10px;"> {{$card->description_pre}}</p>
        </div>
    </div>

    <div class="row" style="">
      <form action="{{route('buy.card', $card->id)}}" method="POST">
        @csrf
        <div class="col s12 m6 z-depth-2 grey lighten-5" style="border-radius: 5px; padding: 15px; border-left: 5px solid rgb(33, 129, 33);">
                        <div class="input-field col s6 selecto" style="margin-top: 20px;" >
                            <select  name="valor" id="valor" onchange="change()" >
                              <option value="{{$card->price}}" selected>{{$card->price}}</option>
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
    </div>
    <div class="row">
        <div class="col s12 m6 grey lighten-5 z-depth-2" style="border-radius: 5px; padding: 15px; border-left: 5px solid rgb(33, 129, 33);">
            <div class="input-field col s6" style="margin-top: 20px;">
                <input type="text" value="{{$card->price*Config::get('tienda.cup', 50)}}" class="validate" id="cup" disabled style="font-size: 30px; font-weight: bold; color: black;">
                <label for="icon_prefix" style="font-size: 20px;">Precio:</label>
              </div>
              <div class="input-field col s6" >
                  <input class="with-gap" name="currency" value="cup" type="radio" id="test5" />
                  <label for="test5" style="font-size: 30px; font-weight: bold;">CUP</label>
              </div> 
        </div>
        <div class="col s12 m6 grey lighten-5 z-depth-2" style="border-radius: 5px; padding: 15px; border-left: 5px solid rgb(33, 129, 33);">
            <div class="input-field col s6" style="margin-top: 20px;">
                <input type="text" value="{{$card->price*Config::get('tienda.mlc', 0.86)}}" class="validate" id="mlc" disabled style="font-size: 30px; font-weight: bold; color: black;">
                <label for="icon_prefix" style="font-size: 20px;">Precio:</label>
              </div>
              <div class="input-field col s6" >
                  <input class="with-gap" name="currency" value="mlc" type="radio" id="test4" />
                  <label for="test4" style="font-size: 30px; font-weight: bold;">MLC</label>
              </div> 
        </div>

    </div>
    <div class="row">
      <div class="col s12 right-align" style="border-radius: 5px; margin-top: 15px;">
            <button type="submit" style="display: inline; float: right;" max-value="2" class="waves-effect waves-light btn grey-text text-lighten-5">$ Comprar</button>
        </form>
    </div>
    </div>

    <script>
        const valor = document.querySelector("#valor");
        const cup = {!! Config::get('tienda.cup', 50) !!};
        const mlc = {!! Config::get('tienda.mlc', 0.86) !!};

        function change() {
            var preciocup = document.getElementById("cup");
            var preciomlc = document.getElementById("mlc");

            preciocup.value = valor.value*cup;
            preciomlc.value = Math.round((valor.value*mlc)*100)/100;
        } 
      </script>
@endsection