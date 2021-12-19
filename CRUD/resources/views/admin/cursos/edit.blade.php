@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>crear un curso nuevo</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
    <div class="card">
        <div class="card-body">
            {{-- se pone model en el formulario con laravel collective para traer los datos--}}
            {!! Form::model($curso,['route'=>['admin.cursos.update', $curso],'autocomplete'=>'off','files'=>true,'method' => 'put']) !!}
            {{-- se traera el formulario --}}
            @include('admin.cursos.partials.form')
                {{-- boton para enviar --}}
                {!! Form::submit('Actualizar curso',['class'=> 'btn btn-primary']) !!}
            {{-- finalizacion del formulario --}}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@include('admin.cursos.partials.funciones')