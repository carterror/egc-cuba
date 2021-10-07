@extends('admin.master')

@section('title')
    Usuarios
@endsection

@section('breadcrumb')
    <a href="{{ route('users') }}" class="breadcrumb"><span class="mdi-social-people"> Usuarios</span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s12 m6" >
                    <h5><i class="mdi-social-people small left"></i>Usuarios</h5>
                </div>
                <div class="col s12 m6" style="padding-top: 5px;">
                    <div class="col s12 m5">
                        <a class='dropdown-button btn' data-beloworigin="true" data-activates='dropdown2'>Ordenar<i class="mdi-navigation-arrow-drop-down right"></i></a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown2' class='dropdown-content'>
                            <li><a href="{{ route('users.show', 'n') }}">Nivel</a></li>
                            <li><a href="{{ route('users.show', 'c') }}">Puntos</a></li>
                        </ul>

                    </div>
                    <div class="col s12 m7">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="col s7">
                            <input type="search" name="user" id="" placeholder="Nombre o email o teléfono">
                            </div>
                            <div class="col s5">
                            <button class="btn" type="submit">Buscar</button>
                            </div>
                        </form>
                    </div>
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
                          @foreach ($users as $user)

                            <tr style="@if($user->rango >= 20) background-color: #B9F2FF; backdrop-filter: blur(5); @elseif($user->rango >= 10) background-color: #FFD700; @elseif($user->rango >= 5) background-color: #E3E4E5; @elseif($user->rango >= 1) background-color: #CD7F32; @endif">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->puntos}}</td>
                                <td>{{$user->rango}}</td>
                                <td>
                                    <a href="{{route('users.show', $user->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Referidos"><i class="mdi-action-account-child small"></i></a>
                                    <a href="{{route('users.delete', $user->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Eliminar"><i class="mdi-action-delete small"></i></a>
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
                {{ $users->links('vendor.pagination.materiallize') }}
            </div>
           

        </div>
    </div>

@endsection
