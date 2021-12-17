@extends('layouts.master')

@section('title')
Referidos
@endsection

@section('content')
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h2 style="margin: 0px !important;"> Referidos </h2>
        <h5 style="margin: 0px !important;"> Rango: </h5>
        <h3 class="teal-text text-lighten-2" style="margin: 0px !important;"> 
            @if(Auth::user()->rango >= 20)
            PLATINO
            @elseif(Auth::user()->rango >= 10)
            ORO
            @elseif(Auth::user()->rango >= 5)
            PLATA
            @elseif(Auth::user()->rango >= 1)
            BRONCE
            @else 
            <a href="{{url('/help#help')}}">Ayuda</a>
            @endif
        </h3>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
    <div class="col s12 center-align">
        <div  class="input-field col s8 m5 offset-m3">
            <span class="prefix"><a href="{{url('/help#help')}}"><i class="mdi-communication-live-help tooltipped" data-position="top" data-delay="50" data-tooltip="Ayuda" ></i></a></span>
        
        <input id="referir" type="text" value="{{route('refer.referir', Auth::user())}}" class="validate">
        <label for="referir">Enlace para Referidos <a href="{{url('/help#help')}}">Ayuda</a> </label>
        </div>
        <div  class="input-field col s4 m3">
        <button class="waves-effect waves-light btn tooltipped" style="float: left;" data-position="top" data-delay="50" data-tooltip="Copiar" onclick="setClipboardCard()"><i class="mdi-content-content-copy"></i></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-1" style="border-radius: 5px; padding: 10px;">
        <table class="responsive-table hoverable">
            <thead>
              <tr>
                  <th data-field="id"><b>Nombre</b></th>
                  <th data-field="name"><b>Correo</b></th>
                  <th data-field="puntos"><b><a href="{{route('order', 1)}}" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Ordenar">Puntos <i class="mdi-action-swap-vert" ></i></a></b></th>
                  <th data-field="rango"><b><a href="{{route('order', 0)}}" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Ordenar">Rango <i class="mdi-action-swap-vert" ></i></a></b></th>
                  <th data-field="price"><b>Fecha de Cuenta</b></th>
              </tr>
            </thead>
    
            <tbody>
                @foreach ($refers as $refer)
                    <tr style="@if($refer->rango >= 20) background-color: #B9F2FF; backdrop-filter: blur(5); @elseif($refer->rango >= 10) background-color: #FFD700; @elseif($refer->rango >= 5) background-color: #E3E4E5; @elseif($refer->rango >= 1) background-color: #CD7F32; @endif">
                        <td>{{$refer->name}}</td>
                        <td>{{$refer->email}}</td>
                        <td>{{$refer->puntos}}</td>
                        <td>
                            @if($refer->rango >= 20)
                            PLATINO
                            @elseif($refer->rango >= 10)
                            ORO
                            @elseif($refer->rango >= 5)
                            PLATA
                            @elseif($refer->rango >= 1)
                            BRONCE
                            @else 
                            Principiante
                            @endif
                        </td>
                        <td>{{$refer->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot >
                {{$refers->links('vendor.pagination.materiallize')}}
                <div class="row" style="text-align: center; margin: 0px;">
                    <div class="col s12">
                        <h5 style="padding: 5px;  margin: 0px;"><b>Total:</b> {{$cant}}</h5>
                    </div>
                </div>
            </tfoot>
          </table>
    </div>
</div>

@endsection
