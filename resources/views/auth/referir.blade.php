<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <div class="row" style="margin-top: 20px; padding-left: 15px;">
            <div class="mb-4 text-sm" style="color: beige; margin-bottom: 20px; padding: 10px; font-size: large;">
                {{ __('Probablemente los correos sean identificados como spam, solo confirmen a gmail que no lo es, pero tendran que buscar el primer correo en la carpeta de spam. Esto debido a que somos un dominio nuevo.') }}
            </div>
            <form class="col s12" method="POST" action="{{ route('refer.store') }}">
                @csrf
                <input type="text" name="refer" value="{{$user->id}}" hidden>
                <div class="row">
                    <div class="col s12 blue-grey-text text-lighten-5 center-align">
                        <h5 for="name">Referido de: {{$user->name}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s11 blue-grey-text text-lighten-5">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input class="blue-grey-text text-lighten-5" id="name" type="text" name="name" :value="old('name')" required>
                        <label for="name">Usuario</label>
                    </div>
                </div>
              <div class="row">
                <div class="input-field col s11 blue-grey-text text-lighten-5">
                    <i class="mdi-content-drafts prefix"></i>
                    <input id="email" class="blue-grey-text text-lighten-5" type="email" name="email" :value="old('email')" required>
                    <label for="email">Correo Electrónico</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s11 blue-grey-text text-lighten-5">
                    <a onclick="verpass('password')" class="prefix"><i class="mdi-image-remove-red-eye tooltipped" id="password icono" data-position="top" data-delay="50" data-tooltip="Ver Contraseña"></i></a>
                    <input class="blue-grey-text text-lighten-5" id="password" type="password" name="password" required autocomplete="current-password">
                    <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s11 blue-grey-text text-lighten-5">
                    <a onclick="verpass('password_confirmation')" class="prefix"><i class="mdi-image-remove-red-eye tooltipped" id="password_confirmation icono" data-position="top" data-delay="50" data-tooltip="Ver Contraseña"></i></a>
                    <input class="blue-grey-text text-lighten-5" id="password_confirmation" type="password" name="password_confirmation" required>
                    <label for="password_confirmation">Confirmar Contraseña</label>
                </div>
              </div>
              <div class="row">
                <p class="col s11 offset-s2">
                    <input type="checkbox" id="test6" required/>
                    <label for="test6">Aceptar <a href="{{route('termi')}}">Terminos de Servicios</a></label>
                  </p>
          </div>
              <div class="row">
                <div class="input-field col s11 right-align">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                <x-button style="margin-left: 10px;">
                    {{ __('Register') }}
                </x-button>
                </div>
               </div>
              
            </form>
          </div>

    </x-auth-card>
</x-guest-layout>
