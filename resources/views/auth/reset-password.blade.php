<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}" style="margin-top: 20px; padding-left: 15px;">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="input-field col s11 blue-grey-text text-lighten-5">
                <i class="mdi-content-drafts prefix"></i>
                <input id="email" class="blue-grey-text text-lighten-5" type="email" name="email" value="{{old('email')}}" required autofocus>
                <label for="email">Correo Electrónico</label>
            </div>

            <!-- Password -->
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

            <x-button style="margin: 10px;">
                {{ __('Reset Password') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
