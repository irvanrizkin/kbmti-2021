@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bankSoalMateri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bank-soal-materi.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.bankSoalMateri.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankSoalMateri.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="link">{{ trans('cruds.bankSoalMateri.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
                @if($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankSoalMateri.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="matkuliah_id">{{ trans('cruds.bankSoalMateri.fields.matkuliah') }}</label>
                <select class="form-control select2 {{ $errors->has('matkuliah') ? 'is-invalid' : '' }}" name="matkuliah_id" id="matkuliah_id" required>
                    @foreach($matkuliahs as $id => $entry)
                        <option value="{{ $id }}" {{ old('matkuliah_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('matkuliah'))
                    <span class="text-danger">{{ $errors->first('matkuliah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankSoalMateri.fields.matkuliah_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bankSoalMateri.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BankSoalMateri::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankSoalMateri.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bankSoalMateri.fields.sub_type') }}</label>
                <select class="form-control {{ $errors->has('sub_type') ? 'is-invalid' : '' }}" name="sub_type" id="sub_type" required>
                    <option value disabled {{ old('sub_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BankSoalMateri::SUB_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sub_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_type'))
                    <span class="text-danger">{{ $errors->first('sub_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bankSoalMateri.fields.sub_type_helper') }}</span>
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