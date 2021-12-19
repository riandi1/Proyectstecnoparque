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
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Nombre') }}" />
        
                            <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                         :value="old('name')" required autofocus autocomplete="name" />
                            <x-jet-input-error for="name"></x-jet-input-error>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Apellido') }}" />
        
                            <x-jet-input class="{{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname"
                                        :value="old('surname')" required autofocus autocomplete="surname" />
                            <x-jet-input-error for="surname"></x-jet-input-error>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Fecha de nacimiento') }}" />
        
                            <x-jet-input class="{{ $errors->has('surname') ? 'is-invalid' : '' }}" type="date" name="dateB"
                                        :value="old('dateB')" required autofocus autocomplete="dateB" />
                            <x-jet-input-error for="dateB"></x-jet-input-error>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Direccion') }}" />
        
                            <x-jet-input class="{{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address"
                                        :value="old('address')" required autofocus autocomplete="address" />
                            <x-jet-input-error for="address"></x-jet-input-error>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Telefono') }}" />
        
                            <x-jet-input class="{{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone"
                                        :value="old('telephone')" required autofocus autocomplete="telephone" />
                            <x-jet-input-error for="telephone"></x-jet-input-error>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Celular') }}" />
    
                        <x-jet-input class="{{ $errors->has('cellphone') ? 'is-invalid' : '' }}" type="text" name="cellphone"
                                    :value="old('cellphone')" required autofocus autocomplete="cellphone" />
                        <x-jet-input-error for="cellphone"></x-jet-input-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Genero') }}" />
                        <select name="gender" class="form-control">
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                        <x-jet-input-error for="gender"></x-jet-input-error>
                    </div>
                </div>
            </div>
                
                @livewire('select')

                <div class="form-group">
                    <x-jet-label value="{{ __('Correo') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Contraseña') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
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

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('¿Ya esta registrado?') }}
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