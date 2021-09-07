<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EGC-Cuba</title>
    <style>
        body{
            background-color: rgba(116, 216, 216, 0.904);
        }
        .btn{
            padding: 8px;
            background-color: rgb(102, 102, 102);
            border-radius: 4px;
            color: aliceblue;
            transition: .6s;
            margin: 5px;
            text-decoration: none;
        }

        .btn:hover{
            background-color: rgb(75, 75, 75);
            cursor: pointer;
        }
        table{
            font-size: 1.5rem;
        }
    </style>
</head>
<body style="background-color: #718096; padding: 10px; color: #fff;" >
    <center>
        <h1>Electronic Gift Card</h1>
    <div style="background-color: #ffffff; padding: 20px; border-radius: 5px; margin: 50px; color: #000;">
        
            <h3>{!!$msg!!}</h3>
    <table border="0" cellspacing="10">
        <tr>
            <td colspan="2" style="text-align: center;">Compra:</td>
        </tr>
        <tr>
            <td>Tarjeta:</td>
            <td>{{$tarjeta}}</td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td>{{$valor}} USD</td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td>{{$price}} <b>{{$currency}}</b></td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td>{{$fecha}}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">Contactos:</td>
        </tr>
        <tr>
            <td>Correo:</td>
            <td><a href="mailto:compras@egc-cuba.com">compras@egc-cuba.com</a></td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td><a href="tel:{{Config::get('tienda.phone', null)}}">{{Config::get('tienda.phone', null)}}</a></td>
        </tr>
        <tr>
            <td>Contactar:</td>
            <td><a href="https://wa.me/message/GKYEWV4I7PUGF1">WhatsApp</a></td>
        </tr>
        <tr>
    </table>
    <h3>Gracias por su confianza. EGC-Cuba</h3>
    </div>
</center>
</body>
</html>
