@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.roles.create')}}">
                Crear Rol
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy',$role)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
