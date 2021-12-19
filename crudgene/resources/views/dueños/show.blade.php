@extends('layouts.app')

@section('title', __('dueños.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('dueños.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('dueños.name') }}</td><td>{{ $dueños->name }}</td></tr>
                        <tr><td>{{ __('dueños.description') }}</td><td>{{ $dueños->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $dueños)
                    <a href="{{ route('dueños.edit', $dueños) }}" id="edit-dueños-{{ $dueños->id }}" class="btn btn-warning">{{ __('dueños.edit') }}</a>
                @endcan
                <a href="{{ route('dueños.index') }}" class="btn btn-link">{{ __('dueños.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
