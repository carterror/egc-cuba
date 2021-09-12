<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm" style="color: beige; margin-bottom: 20px; padding: 10px; font-size: large;">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" style="color: beige; padding: 10px;"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="row" style="margin-top: 20px; padding-left: 15px;">
        <form method="POST" action="{{ route('password.email') }}" >
            @csrf

            <!-- Email Address -->
            <div class="input-field col s11 blue-grey-text text-lighten-5">
                <i class="mdi-content-drafts prefix"></i>
                <input id="email" class="blue-grey-text text-lighten-5" type="email" name="email" value="{{old('email')}}" required autofocus>
                <label for="email">Correo Electrónico</label>
            </div>

            <x-button style="margin: 10px;">
                {{ __('Enviar Correo') }}
            </x-button>
        </form>
    </div>
    </x-auth-card>
</x-guest-layout>
