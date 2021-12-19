@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
            @endif

            {!! Form::model($role, ['route' => ['admin.roles.update',$role],'method' => 'put']) !!}
                @include('admin.roles.partials.form')
            {!! Form::submit('Editar rol',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
