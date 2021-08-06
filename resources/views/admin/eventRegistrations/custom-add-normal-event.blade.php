@extends('layouts.admin.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Pendaftaran Peserta Event
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.event-registrations.customStore') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="event_id" value="{{ $event->id }}">
                @foreach ($event->eventFields as $field)
                    {{-- Template --}}
                  <div class="form-group">
                      <label for="{{ $field->name }}" class="required">{{ trans('cruds.customEventRegistration.fields.' . $field->name) }}</label>
                      <input type="{{ $field->type }}" class="form-control {{ $errors->has($field->name) }}" name="{{ $field->name }}" id="{{ $field->name }}" value="{{ old($field->name, '') }}" required>
                      @if ($errors->has($field->name))
                          <span class="text-danger">{{ $errors->first($field->type) }}</span>
                      @endif
                      {{-- Optional Help Block --}}
                      {{-- <span class="help-block">{{ trans('cruds.customEventRegistration.fields.' . $field->name) }}</span> --}}
                  </div>
                @endforeach
                <div class="form-group">
                  <div class="d-flex justify-content-end">
                    <button class="btn btn-danger" type="submit">
                      {{ trans('global.save') }}
                    </button>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection