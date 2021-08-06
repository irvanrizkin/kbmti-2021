@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.eventFieldChoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.event-field-choices.update", [$eventFieldChoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="choice">{{ trans('cruds.eventFieldChoice.fields.choice') }}</label>
                <input class="form-control {{ $errors->has('choice') ? 'is-invalid' : '' }}" type="text" name="choice" id="choice" value="{{ old('choice', $eventFieldChoice->choice) }}">
                @if($errors->has('choice'))
                    <span class="text-danger">{{ $errors->first('choice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventFieldChoice.fields.choice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_field_id">{{ trans('cruds.eventFieldChoice.fields.event_field') }}</label>
                <select class="form-control select2 {{ $errors->has('event_field') ? 'is-invalid' : '' }}" name="event_field_id" id="event_field_id">
                    @foreach($event_fields as $id => $entry)
                        <option value="{{ $id }}" {{ (old('event_field_id') ? old('event_field_id') : $eventFieldChoice->event_field->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_field'))
                    <span class="text-danger">{{ $errors->first('event_field') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventFieldChoice.fields.event_field_helper') }}</span>
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