@extends('layouts.master')

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
                              <th data-field="tarjeta">ID</th>
                              <th data-field="tarjeta">Tarjeta</th>
                              <th data-field="estado">Estado</th>
                              <th data-field="valor">Valor</th>
                              <th data-field="price">Precio</th>
                              <th data-field="action" style=""></th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($buys as $buy)
                            
                            
                            <tr>
                                <td>{{$buy->id}}</td>
                                <td>{{$buy->card->name}}</td>
                                <td>
                                    @if ($buy->estado == 1)
                                        <div class="card-panel blue lighten-2" style="padding: 5px; color: #fff;">* En espera</div>
                                    @elseif ($buy->estado == 2)
                                        <div class="card-panel teal lighten-2" style="padding: 5px; color: #fff;">* Completado</div>
                                    @else
                                        <div class="card-panel red lighten-2" style="padding: 5px; color: #fff;">* Cancelado</div>
                                    @endif
                                </td>
                                <td>{{$buy->valor}}</td>
                                <td>{{$buy->price}} {{$buy->currency}}</td>
                                @if ($buy->estado != 0)
                                <td>
                                    <a href="{{route('buy.cancel', $buy->id)}}" class="btn tooltipped red lighten-2" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Cancelar"><i class="mdi-action-delete small"></i></a>
                                </td>
                                @endif
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                           
                        </tfoot>
                      </table>
                      
                </div>
                
            </div>
            <div class="row">
                {{ $buys->links('vendor.pagination.materiallize')}}
            </div>
           

        </div>
    </div>

@endsection
