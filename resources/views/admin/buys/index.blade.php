@extends('admin.master')

@section('title')
Compras
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-shopping-cart" >Compras</span></a>
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s10" >
                    <h5><i class="mdi-action-shopping-cart small left"></i>Compras</h5>
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
                            
                            <tr>
                                <td>{{$buy->id}}</td>
                                @if (is_null($buy->usert))
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                @else
                                    <td>{{$buy->usert->name}}</td>
                                    <td>{{$buy->usert->email}}</td>
                                    <td>{{$buy->usert->phone}}</td>
                                @endif
                                @if (is_null($buy->card))
                                    <td>-</td>
                                @else
                                    <td>{{$buy->card->name}}</td>
                                @endif

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
                                        <a href="{{route('extern.delete', [$buy->id, 2])}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Completar"><i class="mdi-action-done small"></i></a>
                                        <a href="{{route('extern.delete', [$buy->id, 0])}}" class="btn red lighten-2 tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-notification-dnd-forwardslash small"></i></a>
                                    @elseif ($buy->estado == 2)
                                        <a href="{{route('extern.delete', [$buy->id, 0])}}" class="btn red lighten-2 tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-notification-dnd-forwardslash small"></i></a>
                                    @else
                                        <a href="{{route('extern.delete', [$buy->id, 2])}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Completar"><i class="mdi-action-done small"></i></a>
                                    @endif

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
                {{ $buys->links() }}
            </div>
           

        </div>
    </div>

@endsection
