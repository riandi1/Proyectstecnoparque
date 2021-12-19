@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if(session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.cursos.create')}}">Nuevo curso</a>
    <h1>Listado de curso</h1>
@stop

@section('content')
    @livewire('admin.curso-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
