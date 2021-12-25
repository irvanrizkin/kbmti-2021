@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pemilwaEvent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pemilwa-events.update", [$pemilwaEvent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tahun">{{ trans('cruds.pemilwaEvent.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun', $pemilwaEvent->tahun) }}">
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaEvent.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pemilwaEvent.fields.is_active') }}</label>
                <select class="form-control {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active" id="is_active">
                    <option value disabled {{ old('is_active', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PemilwaEvent::IS_ACTIVE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_active', $pemilwaEvent->is_active) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaEvent.fields.is_active_helper') }}</span>
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