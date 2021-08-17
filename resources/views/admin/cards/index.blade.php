@extends('admin.master')

@section('title')
    Tarjetas
@endsection

@section('breadcrumb')
<a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-credit-card" > Tarjetas </span></a> 
@endsection

@section('content')

    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-action-credit-card small left"></i>Tarjetas</h5>
                </div>
                <div class="col s5 right-align">
                    <a class="waves-effect waves-light btn" href="{{ route('cards.create') }}" style="margin-top: 5px; z-index: 0 !important;">Nueva</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <table class="responsive-table striped">
                        <thead>
                          <tr>
                              <th data-field="id">Nombre</th>
                              <th data-field="name">Descripción</th>
                              <th data-field="price">Precio</th>
                              <th data-field="action"></th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($cards as $card)
                            
                            
                            <tr>
                                <td>{{$card->name}}</td>
                                <td>{{$card->description_pre}}</td>
                                <td>{{$card->price}}</td>
                                <td>
                                    {{-- <a href="" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Editar"><i class="mdi-editor-border-color small"></i></a> --}}
                                    <a href="{{route('cards.delete', $card->id)}}" class="btn tooltipped" style="padding: 0px 15px;" data-position="top" data-delay="50" data-tooltip="Eliminar"><i class="mdi-action-delete small"></i></a>
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
                {{ $cards->links() }}
            </div>
           

        </div>
    </div>

@endsection
