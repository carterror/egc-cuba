@extends('layouts.master')

@section('title')
Ayuda
@endsection

@section('content')
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <img src="{{asset('img/logo.png')}}" width="50%" alt="Logo" >
        <h5 style="margin: 0px !important;">Ayuda </h5>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-1" style="border-radius: 5px; padding: 10px;">
        <div id="flow" class="section scrollspy">
            <a id="flow-toggle" class="btn waves-effect waves-light"> <i class="mdi-action-search left"></i> Zoom</a>
        <div id="flow-text-demo" class="card-panel grey lighten-5">
            <h4>Empezemos:</h4>

            <p class="">Te ofrecemos nuestra plataforma para poder encargar de forma rápida y fácil cualquiera gift card de su preferencia. Y un sistema de puntos por los que eres recompensado por cada encargo completado con éxito y por los nuevos usuarios que traigas a nuestra plataforma.</p>
           
            <p class="">Nota: Si la tarjeta que necesitas no está en nuestro catálogo por favor contáctanos podemos conseguirla para usted. <a class="fancybox-share__button fancybox-share__button--wa" href="https://wa.me/message/GKYEWV4I7PUGF1"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg><span>WhatsApp</span></a></p>

            <p class="">En la plataforma no se realiza ningún pago por su seguridad y la nuestra, todos los intercambios son realizado privadamente.</p>

            <p class="">Si quieres estar informado de todas nuestras ofertas y cambios le recomendamos unirse a nuestro canal de telegrama o a nuestra página de Facebook</p>
            <ul>
                <li><a class="fancybox-share__button fancybox-share__button--fb"  href="https://www.facebook.com/EGC-Cuba-100361595704420"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196"></path></svg><span>Facebook</span></a></li>
                <li><a class="fancybox-share__button fancybox-share__button--tg"  href="https://t.me/EGC_Cuba"><svg viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path></svg><span>Telegram</span></a></li>
            </ul>

        </div>
  
          </div>
    </div>
    
</div>
<div class="row" >
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h3 style="margin: 0px !important;"> Realizar Pedido </h3>
        <h5 style="margin: 0px !important;"> <a href="{{route('dashboard')}}">Ver tarjetas</a> </h5>
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
                    <h5>Dirigase al inicio y escoja la tarjeta deseada y la moneda a pagar.</h5>
                </div>
                <div class="col s12 m6">
                    <img class="materialboxed responsive-img" src="{{asset('img/pedido1.png')}}">
                </div>    
            </div>    

            <div class="row">
                <div class="col s12 m6 center-align" style="padding-top: 100px;">
                    <h3> Paso 2</h3>
                    <h5>Presione el botón de encargar, y espere las instrucciones de los correos electrónicos que recibirá.</h5>
                </div> 
                <div class="col s12 m6">
                    <img class="materialboxed responsive-img" src="{{asset('img/pedido2.png')}}">
                </div>   
            </div> 

            </div>
    </div>
    </div>
    
</div>
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h3 style="margin: 0px !important;"> Sistema de Puntuación </h3>
        <h5 style="margin: 0px !important;"> <a href="{{route('info')}}">Puntos</a> </h5>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-1" style="border-radius: 5px; padding: 10px;">
        <div id="flow" class="section scrollspy">
            <a id="flow-toggle" class="btn waves-effect waves-light"> <i class="mdi-action-search left"></i> Zoom</a>
        <div id="flow-text-demo" class="card-panel grey lighten-5">
            <h4>Puntos:</h4>

            <p class="">Sistema implementado en nuestra página en el cual eres recompensado por cada encargo completado.</p>
            <p class="">Los puntos pueden ser canjeados por cualquiera de nuestras tarjetas en venta.</p>
            <p class="">Opten desde 0.75 hasta 1.25 punto por cada USD en los encargos completados que realices dependiendo de tu nivel.</p>
            <p class="">IMPORTANTE: Los puntos se agregan automáticamente después de que se confirme la encargo, en un tiempo máximo de 30 minutos.</p>
            
             
            
            <h4><a href="{{route('refer')}}">Referidos:</a></h4>
            
            <p class="">Un sistema en el que se les recompensa con puntos extras por los encargos completados que realicen tus <a href="{{route('refer')}}">Referidos</a>.</p>
            
            <p class="">Opten 0.5 puntos por cada USD en los encargos completados de tus <a href="{{route('refer')}}">Referidos</a>.</p>
            <p class="">IMPORTANTE: El sistema de <a href="{{route('refer')}}">Referidos</a> es de un solo nivel. Los referidos de tus referidos no te aportan bonificaciones.</p>
            
            
            <h4>Niveles:</h4>
            
            <p class="">Bonificación en puntos por la cantidad de <a href="{{route('refer')}}">Referidos</a> que agregues a nuestra página que realicen encargos completados.</p>
            
            <ul>
                <li>1 <a href="{{route('refer')}}">Referido</a> con al menos una encargo completados: NIVEL BRONCE</li>
                <li>5 <a href="{{route('refer')}}">Referidos</a> con al menos una encargo completados: NIVEL PLATA</li>
                <li>10 <a href="{{route('refer')}}">Referidos</a> con al menos una encargo completados: NIVEL ORO</li>
                <li>20 <a href="{{route('refer')}}">Referidos</a> con al menos una encargo completados: NIVEL PLATINO</li>
            </ul>
            
        
            
            <h4>Bonificación por NIVEL:</h4>
            
            <dl>
                <dt>Cuentas BRONCE:</dt>
                <dd>- Bonificación de 100 puntos</dd>
                {{-- <dd>- Opten 0.75 puntos por cada USD en los encargos completados que realices permanentemente</dd>
                <dd>- 0.50 puntos por cada encargo completado de tus referidos</dd> --}}

                <dt>Cuentas PLATA:</dt>
                <dd>- Bonificación de 375 puntos</dd>
                <dd>- Opten 1 punto por cada USD en los encargos completados que realices permanentemente</dd>

                <dt>Cuentas ORO: </dt>
                <dd>- Bonificacione de 475 puntos</dd>
                <dd>- Rebajas en fechas de ofertas especiales</dd>
                
                <dt>Cuentas PLATINO:</dt>
                <dd>- Bonificación de 950 puntos</dd>
                <dd>- Rebajas en fechas de ofertas especiales</dd>
                <dd id="help">- Bono de 0.25 puntos extras por los encargos completados que realicen sus referidos</dd>

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
