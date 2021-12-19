<div>
    {{-- <div>
        <label for="">Departamento</label>
        <select name="depart" class="form-control" wire:change="listarM($event.target.value)" id="select2">
            <option value="">Selecciona</option> --}}
            {{-- @foreach ($departamentos as $departament)
            <option value="{{$departament->id}}">{{$departament->name}}</option>
        @endforeach --}}
        {{-- </select>
    </div> --}}

    <div>
        <label for="">Municipio</label>
        <select :value="old('municipalityid')" name="municipalityid" class="block mt-1 w-full " id="select22">
            <option value="" selected>Selecciona</option>
            <option value="1">el carmen</option>
            <option value="2">la ceja</option>
            <option value="3">el monte</option>
            {{-- @if ($municipios)
                @foreach ($municipios as $municipio)
                <option value="{{$municipio->id}}">{{$municipio->name}}</option>
                @endforeach
            @endif --}}
        </select>
    </div>
</div>
