@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>crear un curso nuevo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- se abre el formulario con laravel collective --}}
            {!! Form::open(['route'=>'admin.cursos.store','autocomplete'=>'off','files'=>true]) !!}
            {{-- se envia el id del usuario que intenta mandar el form --}}
            {{-- se traera el formulario --}}
            @include('admin.cursos.partials.form')
                {{-- boton para enviar --}}
                {!! Form::submit('Crear curso',['class'=> 'btn btn-primary']) !!}
            {{-- finalizacion del formulario --}}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@include('admin.cursos.partials.funciones')

