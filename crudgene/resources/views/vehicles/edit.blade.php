@extends('layouts.app')

@section('title', __('vehicle.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $vehicle)
        @can('delete', $vehicle)
            <div class="card">
                <div class="card-header">{{ __('vehicle.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('vehicle.name') }}</label>
                    <p>{{ $vehicle->name }}</p>
                    <label class="form-label text-primary">{{ __('vehicle.description') }}</label>
                    <p>{{ $vehicle->description }}</p>
                    {!! $errors->first('vehicle_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('vehicle.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('vehicles.destroy', $vehicle) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="vehicle_id" type="hidden" value="{{ $vehicle->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('vehicle.edit') }}</div>
            <form method="POST" action="{{ route('vehicles.update', $vehicle) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('vehicle.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $vehicle->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('vehicle.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $vehicle->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('vehicle.update') }}" class="btn btn-success">
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $vehicle)
                        <a href="{{ route('vehicles.edit', [$vehicle, 'action' => 'delete']) }}" id="del-vehicle-{{ $vehicle->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
