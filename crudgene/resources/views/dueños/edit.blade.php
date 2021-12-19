@extends('layouts.app')

@section('title', __('dueños.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $dueños)
        @can('delete', $dueños)
            <div class="card">
                <div class="card-header">{{ __('dueños.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('dueños.name') }}</label>
                    <p>{{ $dueños->name }}</p>
                    <label class="form-label text-primary">{{ __('dueños.description') }}</label>
                    <p>{{ $dueños->description }}</p>
                    {!! $errors->first('dueños_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('dueños.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('dueños.destroy', $dueños) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="dueños_id" type="hidden" value="{{ $dueños->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('dueños.edit', $dueños) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('dueños.edit') }}</div>
            <form method="POST" action="{{ route('dueños.update', $dueños) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('dueños.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $dueños->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('dueños.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $dueños->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('dueños.update') }}" class="btn btn-success">
                    <a href="{{ route('dueños.show', $dueños) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $dueños)
                        <a href="{{ route('dueños.edit', [$dueños, 'action' => 'delete']) }}" id="del-dueños-{{ $dueños->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
