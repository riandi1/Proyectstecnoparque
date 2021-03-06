<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informacion del Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Aca podra actualizar su nombre de usuario o su correo electronico') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Actualizado.') }}
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
                    <img src="{{ $this->user->profile_photo_url }}"   class="rounded-circle" height="80px" width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecciona una foto') }}
                </x-jet-secondary-button>
                
                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Eliminar foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
            @endif

        <div class="w-md-75">
            <!-- Name -->
            <div class="row">
                <div class="form-group col-lg-6">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name"  autocomplete="name" />
                    <x-jet-input-error for="name" />
                </div>
                <div class="form-group col-lg-6">
                    <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-jet-input id="apellido" type="text"  class="{{ $errors->has('apellido') ? 'is-invalid' : '' }}" wire:model.defer="state.apellido"  autocomplete="apellido" />
                    <x-jet-input-error for="apellido" />
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
			<x-jet-button>
				{{ __('Actualizar') }}
			</x-jet-button>
		</div>
    </x-slot>
</x-jet-form-section>