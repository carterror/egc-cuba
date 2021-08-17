@extends('layouts.master')

@section('title')
Ayuda
@endsection

@section('content')
<div class="row">
    <div class="col s12 center-align" style="margin-top: 0px !important; padding: 0px !important;">
        <h2 style="margin: 0px !important;"> Términos y Condiciones: </h2>
        <h5 style="margin: 0px !important;"> <a href="{{route('refer')}}"></a> </h5>
        <div style="width: 100px; height: 5px; background-color: #bdbdbd; margin: 5px auto;"></div>
    </div>
</div>
<div class="row">
    <div class="col s12 grey lighten-1" style="border-radius: 5px; padding: 10px;">
        <div id="flow" class="section scrollspy">
            <a id="flow-toggle" class="btn waves-effect waves-light"> <i class="mdi-action-search left"></i> Zoom</a>
        <div id="flow-text-demo" class="card-panel grey lighten-5">

            <p class="">El uso de nuestra plataforma está sujeto por reglas y condiciones, para garantizar el buen funcionamiento de la misma y para la seguridad de nuestros clientes.</p>

               <p> 1- Aceptas proporcionarnos su información personal y mantener una dirección de correo electrónico valida mientras mantenga una cuenta en nuestra plataforma, con el objetivo de mantenerlo informado de cualquier cambio.</p>

               <p> 2- La información personal proporcionada es privada y su uso solo por parte de la plataforma para mantener una comunicación personal con nuestros clientes, y no será divulgada bajo ninguna circunstancia.</p>

                <p> 3- Nos reservamos el derecho de modificar los términos y condiciones generales en cualquier momento; por lo tanto, debe visitar estos términos periódicamente para mantenerse actuapzado.</p>

                <p> 4- Ocasionalmente puede haber información en la plataforma que contenga errores tipográficos, inexactitudes u omisiones que puedes estar relacionado con descripciones de servicios, precios, disponibipdad y otra información. La plataforma se reserva el derecho de corregir cualquier error, inexactitud u omisión y de cambiar o actuapzar la información en cualquier momento, sin previo aviso. Pedimos disculpas por cualquier inconveniente que esto puede ocasionar. Si no está satisfecho con su experiencia se puede poner en contacto con nuestros por nuestro correo <a href="mailto:soporte@egc-cuba.com">soporte@egc-cuba.com</a></p>

                <p> 5- A menos que se indique lo contrario todo el material incluido imágenes, ilustraciones, gráficos, logotipos, iconos de botones, diseños y toda la información visual, escrita u oral contenida en la Plataforma, son derecho de autor</p>

                <p> 6- La Plataforma y sus contenidos están destinados solo a su uso personal, usted no puede copiar, ni modificar ningún material obtenido o descargado de nuestra plataforma. NO se le trasfiere ningún derecho, titulo o interés de ningún material obtenido como como resultado de dicha descarga o copia.</p>

                <p> 7- Usted no puede usar nuestra plataforma de ninguna manera que pueda dañar, deshabiptar, sobrecargar o deteriorar la Plataforma o interferir con su uso y disfrute.</p>


        </div>
  
          </div>
    </div>
</div>

@endsection
