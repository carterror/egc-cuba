@extends('admin.master')

@section('title')
    Tarjetas
@endsection

@section('breadcrumb')
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-action-credit-card " > Tarjetas </span></a> /
    <a href="{{ route('cards') }}" class="breadcrumb"><span class="mdi-content-add " >Nueva</span></a>
@endsection

@section('content')
<form action="{{route('cards.update', $card->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="row" style="padding: 20px">
        <div class="col s12 m8 z-depth-3 grey lighten-5" >
            <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
                <div class="col s7" >
                    <h5><i class="mdi-action-credit-card small left"></i>Nueva Tarjetas</h5>
                </div>

                <div class="col s5 right-align">
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Guardar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                        <input id="nombre" name="nombre" type="text" value="{{$card->name}}" class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <input id="price" name="price" type="text" value="{{$card->price}}"  class="validate">
                      <label for="price">Precio Mínimo</label>
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="top" name="top" type="text" value="{{$card->top}}" class="validate">
                      <label for="top">Precio Máximo</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="switch input-field col s12" style="margin-top: -20px;">
                      <label>
                        Limitada
                        <input type="checkbox" name="limited" @if (!$card->limited) checked @endif >
                        <span class="lever"></span>
                        Abierta
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12" style="color: red;">
                      <i>Precios separados por ",", ejemplo: 15,20,50,100</i>
                    </div>
                    <div class="input-field col s12">
                      <label for="descripcion">Precios</label>
                      <input id="precios" name="precios" value="{{$card->precios}}" type="text" class="validate">
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <label for="descripcion" style="margin-top: -10px;">Descripción</label>
                      <textarea id="editor" name="descripcion">{{$card->description}}</textarea>
                    </div>
                  </div>

                </div>
              </div>
            
        </div>
        <div class="col s12 m4" style="padding-left: 10px;">
        <div class="col s12 z-depth-3 grey lighten-5">
          <div class="row" style="border-bottom: 1px solid black; padding: 5px;">
              <div class="col s12" >
                  <h5><i class="mdi-action-credit-card small left"></i>Foto</h5>
              </div>
          </div>
        </form>
        <form action="{{route('cards.update', $card->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="row">
              <div class="col s12">
                <div class="row">
                  <div class="col s12" style="padding: 0px;">
                    <img class="responsive-img" src="{{asset('uploads/'.$card->path)}}">
                  </div>
                </div>
                <div class="row">
                  <div class="file-field input-field col s12">
                      <input class="file-path validate"  type="text"/>
                      <div class="btn">
                        <span>Foto</span>
                        <input type="file" name="photo"/>
                      </div>
                  </div>
                </div>
                
              <div class="col s5 right-align">
                <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Guardar</button>
            </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </form>
  <script src="{{ asset('dist/js/ckeditor.js') }}"></script>
  <script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link' , '|', 'numberedList', 'bulletedList', '|', 'undo', 'redo', '|', 'insertTable', 'blockQuote']
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
  </script>
@endsection
