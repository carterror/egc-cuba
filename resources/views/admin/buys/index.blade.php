@extends('admin.master')

@section('title')
Compras
@endsection

@section('breadcrumb')
    <a href="{{ route('buys') }}" class="breadcrumb"><span class="mdi-action-shopping-cart" >Compras</span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s12 m6" >
                    <h5><i class="mdi-social-people small left"></i>Compras</h5>
                </div>
                <div class="col s12 m6" style="padding-top: 5px;">
                    <form action="{{ route('buys.search') }}" method="post">
                    @csrf
                    <div class="col s12 m5">
                        <!-- Dropdown Structure -->
                            <select name="estado">
                              <option value="5" selected>Estado</option>
                              <option value="4">Todos</option>
                              <option value="1" @if ($para[1] == 1) selected @endif>En Espera</option>
                              <option value="2" @if ($para[1] == 2) selected @endif>Completado</option>
                              <option value="0" @if ($para[1] == 0) selected @endif>Cancelado</option>
                            </select>
                    </div>
                    <div class="col s12 m7">

                            <div class="col s7">
                            <input type="date" value="{{$para[0]}}" name="date" id="">
                            </div>
                            <div class="col s5">
                            <button class="btn" type="submit">Buscar</button>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col s12" style="border-bottom: 1px solid black;">
                    <table class="responsive-table striped">
                        <thead>
                          <tr>
                            <th data-field="id">ID</th>
                              <th data-field="id">Usuario</th>
                              <th data-field="name">Correo</th>
                              <th data-field="price">Teléfono</th>
                              <th data-field="tarjeta">Tarjeta</th>
                              <th data-field="estado">Estado</th>
                              <th data-field="price">Valor</th>
                              <th data-field="price">Precio</th>
                              <th data-field="action"></th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($buys as $buy)
                            @if (!is_null($buy->usert))
                            <tr>
                                <td>{{$buy->id}}</td>
                                    <td>{{$buy->usert->name}}</td>
                                    <td>{{$buy->usert->email}}</td>
                                    <td>{{$buy->usert->phone}}</td>
                                    <td>{{$buy->card->name}}</td>

                                <td>
                                    @if ($buy->estado == 1)
                                        <div class="card-panel blue lighten-2" style="padding: 5px; color: #fff;">En espera</div>
                                    @elseif ($buy->estado == 2)
                                        <div class="card-panel teal lighten-2" style="padding: 5px; color: #fff;">Completado</div>
                                    @else
                                        <div class="card-panel red lighten-2" style="padding: 5px; color: #fff;">Cancelado</div>
                                    @endif
                                </td>
                                <td>{{$buy->valor}} USD</td>
                                <td>{{$buy->price}} {{$buy->currency}}</td>
                                <td>
                                    @if ($buy->estado == 1)
                                        <a href="{{route('extern.delete', [$buy->id, 0])}}" class="btn red lighten-2 tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-notification-dnd-forwardslash small"></i></a>
                                        <a href="{{route('extern.delete', [$buy->id, 1])}}" class="btn blue lighten-2 tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Aceptar"><i class="mdi-action-announcement small"></i></a>
                                        <a href="{{route('extern.delete', [$buy->id, 3])}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Confirmar Tarjeta"><i class="mdi-action-redeem small"></i></a>
                                        <a href="{{route('extern.delete', [$buy->id, 2])}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Confirmar"><i class="mdi-action-done-all small"></i></a>
                                    @elseif ($buy->estado == 2)
                                        <a href="{{route('extern.delete', [$buy->id, 0])}}" class="btn red lighten-2 tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-notification-dnd-forwardslash small"></i></a>
                                    @else
                                        <a href="{{route('extern.delete', [$buy->id, 2])}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Completar"><i class="mdi-action-done-all small"></i></a>
                                    @endif

                                </td>
                            </tr>
                            @endif
                          @endforeach
                        </tbody>
                        <tfoot>
                           
                        </tfoot>
                      </table>
                      
                </div>
                
            </div>
            <div class="row">
                {{ $buys->links('vendor.pagination.materiallize') }}
            </div>
           

        </div>
    </div>

@endsection
