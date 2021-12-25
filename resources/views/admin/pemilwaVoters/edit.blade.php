@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pemilwaVoter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pemilwa-voters.update", [$pemilwaVoter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nim">{{ trans('cruds.pemilwaVoter.fields.nim') }}</label>
                <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" type="text" name="nim" id="nim" value="{{ old('nim', $pemilwaVoter->nim) }}">
                @if($errors->has('nim'))
                    <span class="text-danger">{{ $errors->first('nim') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaVoter.fields.nim_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.pemilwaVoter.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $pemilwaVoter->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaVoter.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="token">{{ trans('cruds.pemilwaVoter.fields.token') }}</label>
                <input class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }}" type="text" name="token" id="token" value="{{ old('token', $pemilwaVoter->token) }}">
                @if($errors->has('token'))
                    <span class="text-danger">{{ $errors->first('token') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaVoter.fields.token_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pemilwa_event_id">{{ trans('cruds.pemilwaVoter.fields.pemilwa_event') }}</label>
                <select class="form-control select2 {{ $errors->has('pemilwa_event') ? 'is-invalid' : '' }}" name="pemilwa_event_id" id="pemilwa_event_id">
                    @foreach($pemilwa_events as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pemilwa_event_id') ? old('pemilwa_event_id') : $pemilwaVoter->pemilwa_event->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pemilwa_event'))
                    <span class="text-danger">{{ $errors->first('pemilwa_event') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaVoter.fields.pemilwa_event_helper') }}</span>
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