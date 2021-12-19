@extends('layouts.app')

@section('title', __('vehicle.detail'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('vehicle.detail') }}</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr><td>{{ __('vehicle.name') }}</td><td>{{ $vehicle->name }}</td></tr>
                            <tr><td>{{ __('vehicle.description') }}</td><td>{{ $vehicle->description }}</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @can('update', $vehicle)
                        <a href="{{ route('vehicles.edit', $vehicle) }}" id="edit-vehicle-{{ $vehicle->id }}" class="btn btn-warning">{{ __('vehicle.edit') }}</a>
                    @endcan
                    <a href="{{ route('vehicles.index') }}" class="btn btn-link">{{ __('vehicle.back_to_index') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
