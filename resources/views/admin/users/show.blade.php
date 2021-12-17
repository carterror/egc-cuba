@extends('admin.master')

@section('title')
    Referidos
@endsection

@section('breadcrumb')
    <a href="{{ route('users') }}" class="breadcrumb"><span class="mdi-social-people"> Usuarios</span></a>  /
    <a href="#" class="breadcrumb"><span class="mdi-social-people"> Referidos</span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s12 m8" >
                    <h5><i class="mdi-social-people small left"></i>Referidos de {{$user->email}}</h5>
                </div>
                <div class="col s12 m4" >
                    <h5>Total: {{$cantirefer}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12" style="border-bottom: 1px solid black;">
                    <table class="responsive-table striped">
                        <thead>
                          <tr>
                            <th data-field="id">Nombre</th>
                            <th data-field="name">Correo</th>
                            <th data-field="price">Teléfono</th>
                            <th data-field="puntos">Puntos</th>
                            <th data-field="rango">Refer:Compra</th>
                            <th data-field="action"></th>
                          </tr>
                        </thead>
                
                        <tbody>
                          @foreach ($referidos as $refer)

                            <tr style="@if($user->rango >= 20) background-color: #B9F2FF; backdrop-filter: blur(5); @elseif($user->rango >= 10) background-color: #FFD700; @elseif($user->rango >= 5) background-color: #E3E4E5; @elseif($user->rango >= 1) background-color: #CD7F32; @endif">
                                <td>{{$refer->name}}</td>
                                <td>{{$refer->email}}</td>
                                <td>{{$refer->phone}}</td>
                                <td>{{$refer->puntos}}</td>
                                <td>{{$refer->rango}}</td>
                                <td>
                                    <a href="{{route('users.show', $refer->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Referidos"><i class="mdi-action-account-child small"></i></a>
                                </td> 
                            </tr>

                          @endforeach
                        </tbody>
                        <tfoot>
                           
                        </tfoot>
                      </table>
                      
                </div>
                
            </div>
            <div class="row">
                {{ $referidos->links('vendor.pagination.materiallize') }}
            </div>
           

        </div>
    </div>

@endsection
