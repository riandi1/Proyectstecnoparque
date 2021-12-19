{{-- se reutilizara este codigo para mejorar rendimiento y evitar duplicar contenido --}}

 {{-- primer input nombre --}}
    <div class="form-group">
        {!! Form::label('name','Nombre:') !!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del curso']) !!}
    </div>
    {{-- su respectivo mensaje de error --}}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
    {{-- slug va hacer para que a la hora de seleccionar un curso en la url se vea el nombre del curso y no el id --}}
    <div class="form-group">
        {!! Form::label('slug','Slug:') !!}
        {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Ingrese el slug del curso','readonly']) !!}
    </div>
    {{-- su respectivo mensaje de error --}}
    @error('slug')
    <small class="text-danger">{{$message}}</small>
    @enderror
    {{-- select que dira a que categoria va ir --}}
    <div class="form-group">
        {!! Form::label('category_id','Categoria:') !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
    </div>
    {{-- su respectivo mensaje de error --}}
    @error('category_id')
    <small class="text-danger">{{$message}}</small>
    @enderror
    {{-- este sera el estado de los curso esto si la persona elije borrado no se publicara --}}
    <div class="form-group">
        <p class="font-weight-bold">Estado:</p>
        <label for="">
            {!! Form::radio('status',1,true) !!}
            Borrador
        </label>
        <label for="">
            {!! Form::radio('status',2) !!}
            Publicado
        </label>
    </div>
    {{-- su respectivo mensaje de error --}}
    @error('status')
    <small class="text-danger">{{$message}}</small>
    @enderror
    {{-- imagen --}}
    <div class="row mb-4">
        {{-- espacio destinado para cargar la imagen --}}
        <div class="col">
            <div class="image-wrapper">
                @isset ($curso->image)
                <img id="picture" src="{{Storage::url($curso->image->url) }}" alt="">
                @else
                <img id="picture" src="" alt="">
                @endisset
            </div>
        </div>
        {{-- input file que solo accepte imagenes --}}
        <div class="col">
            {!! Form::label('file','Imagen que se mostrara') !!}
            {!! Form::file('file',['class' => 'form-control-file','accept'=>'image/*']) !!}
            Por favor la imagen a seleccionar verifique que esta relacionada al curso a tratar, o 
            que haga enfasis al mismo.
        </div>
    {{-- su respectivo mensaje de error --}}
        @error('file')
        <br>
        <small class="text-danger">{{$message}}</small>
        @enderror
        </div>
    {{-- input del tipo de asunto que tratara el curso --}}
        <div class="form-group">
            {!! Form::label('extract','Extracto:') !!}
            {!! Form::textarea('extract',null,['class'=>'form-control']) !!}
        </div>
    {{-- su respectivo mensaje de error --}}
        @error('extract')
        <small class="text-danger">{{$message}}</small>
        @enderror
    {{-- este es el contenido del curso --}}
        <div class="form-group">
            {!! Form::label('body','Tema del curso:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
    {{-- su respectivo mensaje de error --}}
        @error('body')
        <small class="text-danger">{{$message}}</small>
        <br>
        @enderror