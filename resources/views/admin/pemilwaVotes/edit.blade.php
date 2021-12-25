@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.votes.update", [$vote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="pemilwa_event_id">{{ trans('cruds.vote.fields.pemilwa_event') }}</label>
                <select class="form-control select2 {{ $errors->has('pemilwa_event') ? 'is-invalid' : '' }}" name="pemilwa_event_id" id="pemilwa_event_id">
                    @foreach($pemilwa_events as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pemilwa_event_id') ? old('pemilwa_event_id') : $vote->pemilwa_event->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pemilwa_event'))
                    <span class="text-danger">{{ $errors->first('pemilwa_event') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vote.fields.pemilwa_event_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pemilwa_candidate_id">{{ trans('cruds.vote.fields.pemilwa_candidate') }}</label>
                <select class="form-control select2 {{ $errors->has('pemilwa_candidate') ? 'is-invalid' : '' }}" name="pemilwa_candidate_id" id="pemilwa_candidate_id">
                    @foreach($pemilwa_candidates as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pemilwa_candidate_id') ? old('pemilwa_candidate_id') : $vote->pemilwa_candidate->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pemilwa_candidate'))
                    <span class="text-danger">{{ $errors->first('pemilwa_candidate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vote.fields.pemilwa_candidate_helper') }}</span>
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