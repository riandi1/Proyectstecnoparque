<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <div class="mb-3">
                {{ __('¿Olvidó su contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos por correo electrónico un enlace de restablecimiento de contraseña que le permitirá elegir uno nuevo. ') }}
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf

                <div class="form-group">
                    <x-jet-label value="Correo" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-jet-button>
                        {{ __('Vínculo de restablecimiento de contraseña de correo electrónico') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>