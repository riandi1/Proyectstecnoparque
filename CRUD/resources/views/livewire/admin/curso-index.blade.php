<div class="card">
    @can('admin.cursos.create')
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="ingrese el nombre del curso">
        </div>
    @endcan
    @if ($cursos->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->id }}</td>
                            <td>{{ $curso->name }}</td>
                            <td>
                                @if ($curso->status == 2)
                                    <strong>publicado</strong>
                                @else
                                    <strong>Borrador</strong>
                                @endif
                            </td>
                            <td with="10px">
                                @can('admin.cursos.edit')
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.cursos.edit', $curso) }}">Editar</a>
                                @endcan
                            </td>
                            <td with="10px">
                                @can('admin.cursos.destroy')
                                    <form action="{{ route('admin.cursos.destroy', $curso) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $cursos->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningun registro...</strong>
        </div>
    @endif
</div>
