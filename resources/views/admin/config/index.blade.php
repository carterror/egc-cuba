@extends('admin.master')

@section('title')
    Configuraciones
@endsection

@section('breadcrumb')
    <a href="{{ route('config') }}" class="breadcrumb"><span class="mdi-device-now-widgets small" > Configuraciones </span></a>
@endsection

@section('content')
<form action="{{route('config.update')}}" method="POST">
  @csrf
    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-device-now-widgets small left"></i>Configuraciones</h5>
                </div>

                <div class="col s5 right-align">
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;"><i class="mdi-content-add left" style="margin: 0px;"></i>Guardar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s4">
                        <input id="phone" name="phone" type="text" value="{{Config::get('tienda.phone', null)}}" class="validate">
                        <label for="phone">Teléfono</label>
                    </div>
                    <div class="input-field col s4">
                      <input id="cup" name="cup" value="{{Config::get('tienda.cup', null)}}" type="text" class="validate">
                      <label for="cup">Valor CUP</label>
                  </div>
                  <div class="input-field col s4">
                    <input id="mlc" name="mlc" value="{{Config::get('tienda.mlc', null)}}" type="text" class="validate">
                    <label for="mlc">Valor MLC</label>
                </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                        <input id="bono" name="bono" type="text" value="{!! Config::get('tienda.bono', null)!!}" class="validate">
                        <label for="bono">Bonificación</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="product_pag" name="product_pag" value="{{Config::get('tienda.product_pag', null)}}" type="number" class="validate">
                      <label for="product_pag">Productos por página</label>
                  </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="descript" name="descript" value="{{Config::get('tienda.descript', null)}}" type="text" class="validate">
                      <label for="descript">Breve Descripción</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="ubicacion" name="ubicacion" value="{{Config::get('tienda.ubicacion', null)}}" class="materialize-textarea"></textarea>
                      <label for="ubicacion">Ubicación</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                        
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </form>
@endsection
