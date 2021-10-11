@extends('admin.master')

@section('title')
    Configuraciones
@endsection

@section('breadcrumb')
    <a href="{{ route('config') }}" class="breadcrumb"><span class="mdi-device-now-widgets small" > Resumen </span></a>
@endsection

@section('content')
    <div class="row" style="padding: 20px; margin: 0px;">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-device-now-widgets small left"></i>Estadísticas Rápidas</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12" style="font-size: large;">
                La tarjeta más vendida es: <b>{{$cardvv->name ?? ''}}</b>, con <b>{{$ventas ?? ''}}</b> ventas.
              </div>
            </div>

        </div>
    </div>
    <div class="row z-depth-3" style="color: black; margin:0px 20px;">

      <div class="col s6 m3 center-align" style="padding: 2px 0px; background-color: #B9F2FF; backdrop-filter: blur(5);">
        <h5 style="font-weight: bold; margin: 0px;"><b>{{$users->where('rango', '>', 19)->count()}}</b></h5>
      </div>
      <div class="col s6 m3 center-align" style="padding: 2px 0px; background-color: #FFD700;">
        <h5 style="font-weight: bold; margin: 0px;"><b>{{$users->where('rango', '>', 9)->where('rango', '<', 20)->count()}}</b></h5>
      </div>
      <div class="col s6 m3 center-align" style="padding: 2px 0px; background-color: #E3E4E5;">
        <h5 style="font-weight: bold; margin: 0px;"><b>{{$users->where('rango', '>', 4)->where('rango', '<', 10)->count()}}</b></h5>
      </div>
      <div class="col s6 m3 center-align" style="padding: 2px 0px; background-color: #CD7F32;">
        <h5 style="font-weight: bold; margin: 0px;"><b>{{$users->where('rango', '>', 0)->where('rango', '<', 5)->count()}}</b></h5>
      </div>
    
    </div>
    <div class="row" style="padding: 0px 20px; margin: 0px;">
        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <a href="{{route('users')}}">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-social-people small left"></i>Usuarios</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">{{$users->count()}}</h3>
              </div>
            </div>
          </div>
          </a>
        </div>

        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <a href="{{route('cards')}}">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-action-credit-card small left"></i>Tarjetas</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">{{$card}}</h3>
              </div>
            </div>
          </div>
          </a>
        </div>

        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-editor-attach-money small left"></i>Recaudado</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">${{$buyms}}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-editor-attach-money small left"></i>Recaudado hoy</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">${{$buymsh}}</h3>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row" style="padding: 0px 20px;">
      
        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <a href="{{route('buys')}}">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-action-add-shopping-cart small left"></i>Ordenes</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">{{$count}}</h3>
              </div>
            
            </div>
          </div>
          </a>
        </div>

        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <a href="{{route('buys')}}">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-action-shopping-cart small left"></i>Ventas</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">{{$buys}}</h3>
              </div>
            
            </div>
          </div>
          </a>
        </div>

        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <a href="{{route('buys')}}">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-action-add-shopping-cart small left"></i>Ordenes Hoy</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">{{$counth}}</h3>
              </div>
            
            </div>
          </div>
          </a>
        </div>

        <div class="col s12 m6 l3" style="margin-top: 15px; padding: 15px;">
          <a href="{{route('buys')}}">
          <div class="row grey lighten-5 z-depth-3">
            <div class="row" style="border-bottom: 1px solid rgb(138, 138, 138); padding: 5px;">
            <div class="col s12" >
                    <h5><i class="mdi-action-shopping-cart small left"></i>Ventas Hoy</h5>
                </div>
            </div>
            <div class="row">
              <div class="col s12 center-align" >
                <h3 style="font-weight: bold; margin: 0px;">{{$buysh}}</h3>
              </div>
            
            </div>
          </div>
          </a>
        </div>

    </div>

@endsection