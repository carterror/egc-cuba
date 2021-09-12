<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}


        <div class="row" style="margin-top: 20px; padding-left: 15px;">
            <form class="col s12" method="POST" action="{{ route('login') }}">
                @csrf
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
                    <p class="col s11 offset-s2">
                        <input type="checkbox" id="test6"/>
                        <label for="test6">{{ __('Remember me') }}</label>
                      </p>
              </div>
              <div class="row">
                <div class="input-field col s11 right-align">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button style="margin-left: 10px;">
                    {{ __('Log in') }}
                </x-button>
                </div>
               </div>
              
            </form>
          </div>

    </x-auth-card>
</x-guest-layout>
