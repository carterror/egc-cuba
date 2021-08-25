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
                <li>1 <a href="{{route('refer')}}">Referido</a> con al menos una compra: NIVEL BRONCE</li>
                <li>5 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: NIVEL PLATA</li>
                <li>10 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: NIVEL ORO</li>
                <li>20 <a href="{{route('refer')}}">Referidos</a> con al menos una compra: NIVEL PLATINO</li>
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
                <dd id="help">- Bono de 0.25 puntos extras por las compras que realicen sus referidos</dd>

            </dl>

        </div>
  
          </div>
    </div>
    
</div>

<div class="row" >
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h3 style="margin: 0px !important;"> Sistema de Referidos </h3>
        <h5 style="margin: 0px !important;"> <a href="{{route('refer')}}">Referidos</a> </h5>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-1" style="border-radius: 5px; padding: 10px;">
        <div id="flow" class="section scrollspy">
         
        <div id="flow-text-demo" class="card-panel grey lighten-5">
           
            <div class="row">
                <div class="col s12 m6 center-align" style="padding-top: 100px;">
                    <h3> Paso 1</h3>
                    <h5>Iniciar tu sección en la plataforma </h5>
                </div>
                <div class="col s12 m6">
                    <img class="materialboxed responsive-img" src="{{asset('img/help1.png')}}">
                </div>    
            </div>    

            <div class="row">
                <div class="col s12 m6 center-align" style="padding-top: 100px;">
                    <h3> Paso 2</h3>
                    <h5>Desplegar el menú de usuario y ir a la pestaña de referidos  </h5>
                </div> 
                <div class="col s12 m6">
                    <img class="materialboxed responsive-img" src="{{asset('img/help2.png')}}">
                </div>   
            </div> 

            <div class="row">
                <div class="col s12 m6 center-align" style="padding-top: 100px;">
                    <h3> Paso 3</h3>
                    <h5>Copiar enlace o tocar en botón del link de referido para copiarlo </h5>
                </div>
                <div class="col s12 m6">
                    <img class="materialboxed responsive-img" src="{{asset('img/help3.png')}}">
                </div>    
            </div>    

            <div class="row">
                <div class="col s12 m6 center-align" style="padding-top: 100px;">
                    <h3> Paso 4</h3>
                    <h5>Pasar el enlace a su referido para que se registre por ese enlace  </h5>
                </div> 
                <div class="col s12 m6">
                    <img class="materialboxed responsive-img" src="{{asset('img/help4.png')}}">
                </div>   
            </div> 

           

        </div>
    </div>
</div>
    
</div>

@endsection
