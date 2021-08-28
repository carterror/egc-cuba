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
                    <button type="submit" class="waves-effect waves-light btn" style="margin-top: 5px; z-index: 0 !important;">Guardar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12" style="color: red;">
                      <i>Especiales dejando limitada: Fortnite | Steam | PlayStation | Nintendo | Blizzard | Shein</i>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="nombre" name="nombre" type="text" class="validate">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="file-field input-field col s12 m6">
                     
                        <input class="file-path validate"  type="text"/>
                        <div class="btn">
                          <span>Foto</span>
                          <input type="file" name="photo" />
                        </div>

                  </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 m4">
                      <input id="price" name="price" type="text" class="validate">
                      <label for="price">Precio Mínimo</label>
                    </div>
                    <div class="input-field col s12 m4">
                      <input id="top" name="top" type="text" class="validate">
                      <label for="top">Precio Máximo</label>
                    </div>
                    <div class="switch input-field col s12 m4">
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
                      <label for="descripcion">Descripción</label>
                      <textarea id="editor" name="descripcion"></textarea>
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
