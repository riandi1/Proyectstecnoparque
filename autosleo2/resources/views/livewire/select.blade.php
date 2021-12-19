<div>
    <div class="row">
        <div class="col-md-6">
            <label for="">Departamento</label>
            <select  class="form-control" wire:change="listar($event.target.value)" id="select2">
                <option value="">Selecciona</option>
                @foreach ($departamentos as $departament)
                <option value="{{$departament->id}}">{{$departament->name}}</option>
            @endforeach
            </select>
        </div>
    
        <div class="col-md-6">
            <label for="">Municipio</label>
            <select  name="municipalityid" class="form-control {{ $errors->has('municipalityid') ? 'is-invalid' : '' }}"  id="select22">
                <option value="" selected>Selecciona</option>
                @if ($municipios)
                @foreach ($municipios as $municipio)
                <option value="{{$municipio->id}}">{{$municipio->name}}</option>
                @endforeach
                @endif
                  
                
            </select>
        </div>
    </div>
     {{-- <script>
       $('$municipios',function(){
            $('#select22').select2();
        })
    </script> --}}
</div>
