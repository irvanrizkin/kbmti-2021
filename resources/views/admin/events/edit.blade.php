@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.update", [$event->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.event.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $event->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="label">{{ trans('cruds.event.fields.label') }}</label>
                <input class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" type="text" name="label" id="label" value="{{ old('label', $event->label) }}">
                @if($errors->has('label'))
                    <span class="text-danger">{{ $errors->first('label') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.label_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $event->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.event.fields.event_type') }}</label>
                <select class="form-control {{ $errors->has('event_type') ? 'is-invalid' : '' }}" name="event_type" id="event_type" required>
                    <option value disabled {{ old('event_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Event::EVENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('event_type', $event->event_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_type'))
                    <span class="text-danger">{{ $errors->first('event_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expired_date">{{ trans('cruds.event.fields.expired_date') }}</label>
                <input class="form-control date {{ $errors->has('expired_date') ? 'is-invalid' : '' }}" type="text" name="expired_date" id="expired_date" value="{{ old('expired_date', $event->expired_date) }}" required>
                @if($errors->has('expired_date'))
                    <span class="text-danger">{{ $errors->first('expired_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.expired_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.event.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $event->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.user_helper') }}</span>
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