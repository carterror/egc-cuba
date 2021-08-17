@extends('layouts.master')

@section('title')
Ayuda
@endsection

@section('content')
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h3 style="margin: 0px !important;"> Sistema de Implementación </h3>
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
            <p class="">Opten desde 0.75 hasta 1.25 punto por cada USD en las compras que realices dependiendo de tu nivel.</p>
            <p class="">IMPORTANTE: Los puntos se agragan automáticamente después de que se confirme la compra, en un tiempo máximo de 30 minutos.</p>
            
             
            
            <h4><a href="{{route('refer')}}">Referidos:</a></h4>
            
            <p class="">Un sistema en el que se les recompensa con puntos extras por las compras que realicen tus <a href="{{route('refer')}}">Referidos</a>.</p>
            
            <p class="">Opten 0.5 puntos por cada USD en las compras de tus <a href="{{route('refer')}}">Referidos</a>.</p>
            <p class="">IMPORTANTE: El sistema de <a href="{{route('refer')}}">Referidos</a> es de un solo nivel. Los referidos de tus referidos no te aportan bonificaciones.</p>
            
            
            <h4>Niveles:</h4>
            
            <p class="">Bonificación en puntos por la cantidad de <a href="{{route('refer')}}">Referidos</a> que agregues a nuestra página que realicen compras.</p>
            
            <ul>
                <li>1 <a href="{{route('refer')}}">Referido</a> con al menos una compra: 100 puntos NIVEL BRONCE</li>
                <li>5 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: 375 puntos NIVEL PLATA</li>
                <li>10 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: 475 puntos NIVEL ORO</li>
                <li>20 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: 950 puntos NIVEL PLATINO</li>
            </ul>
            
        
            
            <h4>Bonificación por NIVEL:</h4>
            
            <dl>
                <dt>Cuentas BRONCE:</dt>
                <dd>- Bonificación de 100 puntos</dd>
                <dd>- Opten 0.75 puntos por cada USD en las compras que realices permanentemente</dd>
                <dd>- 0.50 puntos por cada compra de tus referidos</dd>

                <dt>Cuentas PLATA:</dt>
                <dd>- Bonificación de 375 puntos</dd>
                <dd>- Opten 1 punto por cada USD en las compras que realices permanentemente</dd>

                <dt>Cuentas ORO: </dt>
                <dd>- Bonificacione de 475 puntos</dd>
                <dd>- Rebajas en fechas de ofertas especiales</dd>
                
                <dt>Cuentas PLATINO:</dt>
                <dd>- Bonificación de 950 puntos</dd>
                <dd>- Rebajas en fechas de ofertas especiales</dd>
                <dd>- Bono de 0.25 puntos extras por las compras que realicen sus referidos</dd>

            </dl>

        </div>
  
          </div>
    </div>
</div>

@endsection
