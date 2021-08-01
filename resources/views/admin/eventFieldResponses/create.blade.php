@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.eventFieldResponse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.event-field-responses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="response">{{ trans('cruds.eventFieldResponse.fields.response') }}</label>
                <input class="form-control {{ $errors->has('response') ? 'is-invalid' : '' }}" type="text" name="response" id="response" value="{{ old('response', '') }}">
                @if($errors->has('response'))
                    <span class="text-danger">{{ $errors->first('response') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventFieldResponse.fields.response_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_registration_id">{{ trans('cruds.eventFieldResponse.fields.event_registration') }}</label>
                <select class="form-control select2 {{ $errors->has('event_registration') ? 'is-invalid' : '' }}" name="event_registration_id" id="event_registration_id">
                    @foreach($event_registrations as $id => $entry)
                        <option value="{{ $id }}" {{ old('event_registration_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_registration'))
                    <span class="text-danger">{{ $errors->first('event_registration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventFieldResponse.fields.event_registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_field_id">{{ trans('cruds.eventFieldResponse.fields.event_field') }}</label>
                <select class="form-control select2 {{ $errors->has('event_field') ? 'is-invalid' : '' }}" name="event_field_id" id="event_field_id">
                    @foreach($event_fields as $id => $entry)
                        <option value="{{ $id }}" {{ old('event_field_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_field'))
                    <span class="text-danger">{{ $errors->first('event_field') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventFieldResponse.fields.event_field_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection