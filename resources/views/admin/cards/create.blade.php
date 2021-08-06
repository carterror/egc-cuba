@extends('admin.master')

@section('title')
    Tarjetas
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-credit-card " > Tarjetas </span></a> /
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-content-add " >Nueva</span></a>
@endsection

@section('content')
<form action="{{route('cards.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row" style="padding: 20px">
        <div class="col s12 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-action-credit-card small left"></i>Nueva Tarjetas</h5>
                </div>

                <div class="col s5 right-align">
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;"><i class="mdi-content-add left" style="margin: 0px;"></i>Guardar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s6">
                        <input id="nombre" name="nombre" type="text" class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                      <div class="file-field input-field">
                        <select name="tipo" >
                          <option value="" disabled selected>Tarjeta de...</option>
                          <option value="netflix">Netflix</option>
                          <option value="apps">App Store y iTunes</option>
                          <option value="xbox">Xbox</option>
                          <option value="paypal">PayPal</option>
                          <option value="ebay">eBay</option>
                          <option value="nintendo">Nintendo</option>
                          <option value="spotify">Spotify</option>
                          <option value="gplay">Google Play </option>
                          <option value="psn">PlayStation</option>
                          <option value="amazon">Amazon </option>
                          <option value="fornite">Fortnite PaVos</option>
                        </select>
                        <label>Tipo de tarjeta</label>
                        </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s4">
                      <input id="price" name="price" type="text" class="validate">
                      <label for="price">Precio Mínimo</label>
                    </div>
                    <div class="input-field col s4">
                      <input id="top" name="top" type="text" class="validate">
                      <label for="top">Precio Máximo</label>
                    </div>
                    <div class="switch input-field col s4">
                      <label>
                        Limitada
                        <input type="checkbox" name="limited">
                        <span class="lever"></span>
                        Abierta
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="descripcion" name="descripcion" type="text" class="validate">
                      <label for="descripcion">Breve Descripción</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="descripcion1" name="descripcion1" class="materialize-textarea"></textarea>
                      <label for="descripcion1">Descripción</label>
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
