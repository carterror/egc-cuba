
@if ($errors->any())
     @foreach ($errors->all() as $error)
        <script>
            Materialize.toast('<i class="small mdi-alert-error red-text" style="margin-right: 5px;"></i> <h5 class="red-text">{{$error}}</h5>', 5000);
        </script>
    @endforeach
@endif


@if(Session::has('message'))
    <script>
        Materialize.toast('<i class="{{ Session::get("icon") }}" style="margin-right: 5px;"></i> <h5 class="{{ Session::get("type") }}">{{ Session::get("message") }}</h5>', 5000);
    </script>
@endif 


