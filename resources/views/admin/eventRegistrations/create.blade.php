@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.eventRegistration.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.event-registrations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="dummy_name">{{ trans('cruds.eventRegistration.fields.dummy_name') }}</label>
                <input class="form-control {{ $errors->has('dummy_name') ? 'is-invalid' : '' }}" type="text" name="dummy_name" id="dummy_name" value="{{ old('dummy_name', '') }}">
                @if($errors->has('dummy_name'))
                    <span class="text-danger">{{ $errors->first('dummy_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventRegistration.fields.dummy_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_id">{{ trans('cruds.eventRegistration.fields.event') }}</label>
                <select class="form-control select2 {{ $errors->has('event') ? 'is-invalid' : '' }}" name="event_id" id="event_id" required>
                    @foreach($events as $id => $entry)
                        <option value="{{ $id }}" {{ old('event_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event'))
                    <span class="text-danger">{{ $errors->first('event') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.eventRegistration.fields.event_helper') }}</span>
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