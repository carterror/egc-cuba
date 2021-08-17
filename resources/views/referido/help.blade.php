@extends('layouts.master')

@section('title')
Ayuda
@endsection

@section('content')
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h2 style="margin: 0px !important;"> Ayuda </h2>
        <h5 style="margin: 0px !important;"> <a href="{{route('refer')}}">Referidos</a> </h5>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-1" style="border-radius: 5px; padding: 10px;">
        <div id="flow" class="section scrollspy">
            <a id="flow-toggle" class="btn waves-effect waves-light"> <i class="mdi-action-search left"></i> Zoom</a>
        <div id="flow-text-demo" class="card-panel grey lighten-5">
            <h4>Puntos:</h4>

            <p class="">Sistema implementado en nuestra página en el cual eres recompensado por cada compra realizada.</p>
            
            <p class=""> Los puntos pueden ser canjeados por cualquiera de nuestras tarjetas en venta.</p>
            
            <p class="">Opten 1 punto por cada USD en las compras que realices</p>
            
             
            
            <h4><a href="{{route('refer')}}">Referidos:</a></h4>
            
            <p class="">Un sistema en el que se les recompensa con puntos extras por las compras que realicen tus <a href="{{route('refer')}}">Referidos</a></p>
            
            <p class="">Opten 0.5 puntos por cada USD en las compras de tus <a href="{{route('refer')}}">Referidos</a></p>
            
            
            
            <h4>Niveles:</h4>
            
            <p class="">Bonificación en puntos por la cantidad de <a href="{{route('refer')}}">Referidos</a> que agregues a nuestra página que realicen compras</p>
            
            <ul>
                <li>1 <a href="{{route('refer')}}">Referido</a> con al menos una compra: 100 puntos NIVEL BRONCE</li>
                <li>5 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: 375 puntos NIVEL PLATA</li>
                <li>10 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: 475 puntos NIVEL ORO</li>
                <li>20 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: 950 puntos NIVEL PLATINO</li>
            </ul>
            
        
            
            <h4>Bonificación por NIVEL:</h4>
            
            <p class="">Cuentas ORO: rebajas en fechas de ofertas especiales </p>
            
            <p class="">Cuentas PLATINO: Rebajas en fechas de ofertas especiales y bono de puntos extras por las compras que realicen sus <a href="{{route('refer')}}">Referidos</a>. Enviado desde mi iPhone</p>
            
        </div>
  
          </div>
    </div>
</div>

@endsection
