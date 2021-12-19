<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="form-group" x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <input type="file" hidden
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
				</x-jet-secondary-button>
				
				@if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class="w-md-100">
            <!-- Name -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                        <x-jet-input-error for="name" />
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-label value="{{ __('apellido') }}" />
    
                        <x-jet-input class="{{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" wire:model.defer="state.surname"
                                    :value="old('surname')" required  autocomplete="surname" />
                        <x-jet-input-error for="surname"></x-jet-input-error>
                    </div>
                </div>
            </div>
            <!-- Email -->
            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>

            <div class="row">
    
                <div class="col-md-12">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Direccion') }}" />
    
                        <x-jet-input class="{{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" wire:model.defer="state.address"
                                    :value="old('address')" required  autocomplete="address" />
                        <x-jet-input-error for="address"></x-jet-input-error>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Telefono') }}" />
    
                        <x-jet-input class="{{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" wire:model.defer="state.telephone"
                                    :value="old('telephone')" required  autocomplete="telephone" />
                        <x-jet-input-error for="telephone"></x-jet-input-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Celular') }}" />
    
                        <x-jet-input class="{{ $errors->has('cellphone') ? 'is-invalid' : '' }}" type="text" wire:model.defer="state.cellphone"
                                    :value="old('cellphone')" required  autocomplete="cellphone" />
                        <x-jet-input-error for="cellphone"></x-jet-input-error>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
			<x-jet-button>
				{{ __('Save') }}
			</x-jet-button>
		</div>
    </x-slot>
</x-jet-form-section>