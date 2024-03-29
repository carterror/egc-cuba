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
<body style="background-color: #718096;">
    <center>
    
    <div style="background-color: #ffffff; padding: 20px; border-radius: 5px;">
    <h1>Electronic Gift Card</h1>
    <h2>Compra {{$id}}:</h2>
    <br>
    <table border="0" cellspacing="10">
        <tr>
            <td>Nombre:</td>
            <td style="background-color: @if(Auth::user()->rango >= 20) #fbc02d color: transparent; @elseif(Auth::user()->rango >= 10) #eceff1; color: #263238; @endif"><b>{{$name->name}}</b> {{$name->last_name}}</td>
        </tr>
        <tr>
            <td>Correo:</td>
            <td><a href="mailto:{{$name->email}}">{{$name->email}}</a></td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td><a href="tel:{{$name->phone}}">{{$name->phone}}</a></td>
        </tr>
        <tr>
            <td>Tarjeta:</td>
            <td>{{$tarjeta}}</td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td>{{$valor}}</td>
        </tr>
        <tr>
            <td>Precio:</td>
            <td>{{$price}} <b>{{$currency}}</b></td>
        </tr>
        <tr>
            <td colspan="2"><a href="{{route('extern.delete', [$id, 0])}}" class="btn">Denegar</a></td>
        </tr> 
        <tr>
            <td colspan="2"><a href="{{route('extern.delete', [$id, 1])}}" class="btn">Aceptar</a></td>
        </tr> 
        <tr>
            <td colspan="2"><a href="{{route('extern.delete', [$id, 3])}}" class="btn">Tarjeta</a></td>
        </tr>
        <tr>
            <td colspan="2"><a href="{{route('extern.delete', [$id, 2])}}" class="btn">Confirmar</a></td>
        </tr>  
    </table>
    </div>
    </center>
</body>
</html>
