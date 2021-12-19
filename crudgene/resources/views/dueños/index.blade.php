@extends('layouts.app')

@section('title', __('dueños.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Dueños)
            <a href="{{ route('dueños.create') }}" class="btn btn-success">{{ __('dueños.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('dueños.list') }} <small>{{ __('app.total') }} : {{ $dueños->total() }} {{ __('dueños.dueños') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('dueños.search') }}</label>
                        <input placeholder="{{ __('dueños.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('dueños.search') }}" class="btn btn-secondary">
                    <a href="{{ route('dueños.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('dueños.name') }}</th>
                        <th>{{ __('dueños.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dueños as $key => $dueños)
                    <tr>
                        <td class="text-center">{{ $dueños->firstItem() + $key }}</td>
                        <td>{!! $dueños->name_link !!}</td>
                        <td>{{ $dueños->description }}</td>
                        <td class="text-center">
                            @can('view', $dueños)
                                <a href="{{ route('dueños.show', $dueños) }}" id="show-dueños-{{ $dueños->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $dueños->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
