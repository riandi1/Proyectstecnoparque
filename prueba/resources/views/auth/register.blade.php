<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                        <x-jet-label value="{{ __('Nombre') }}" />

                        <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>

                    <div class="form-group col-lg-6">
                        <x-jet-label value="{{ __('Apellido') }}" />

                        <x-jet-input class="{{ $errors->has('apellido') ? 'is-invalid' : '' }}" type="text" name="apellido"
                                    :value="old('apellido')" required autofocus autocomplete="apellido" />
                        <x-jet-input-error for="apellido"></x-jet-input-error>
                    </div>
                </div>

                
                <div class="row">
                    <div class="form-group col-lg-6">
                        <x-jet-label value="{{ __('Cedula') }}" />

                        <x-jet-input class="{{ $errors->has('cedula') ? 'is-invalid' : '' }}" type="number" name="cedula"
                                    :value="old('cedula')"  />
                        <x-jet-input-error for="cedula"></x-jet-input-error>
                    </div>

                    <div class="form-group col-lg-6">
                        <x-jet-label value="{{ __('Correo') }}" />

                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" :value="old('email')" required  />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <x-jet-label value="{{ __('Contraseña') }}" />

                        <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                    name="password" required autocomplete="new-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>
                
                    <div class="form-group col-lg-6">
                        <x-jet-label value="{{ __('Confirmar Contraseña') }}" />

                        <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0 ">
                    <div class="d-flex justify-content-center align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('¿Estas registrado?') }}
                        </a>

                        <x-jet-button>
                            {{ __('Registrarse') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>