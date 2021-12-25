@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pemilwaCandidate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pemilwa-candidates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.pemilwaCandidate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaCandidate.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.pemilwaCandidate.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaCandidate.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_urut">{{ trans('cruds.pemilwaCandidate.fields.no_urut') }}</label>
                <input class="form-control {{ $errors->has('no_urut') ? 'is-invalid' : '' }}" type="text" name="no_urut" id="no_urut" value="{{ old('no_urut', '') }}">
                @if($errors->has('no_urut'))
                    <span class="text-danger">{{ $errors->first('no_urut') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaCandidate.fields.no_urut_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pemilwaCandidate.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PemilwaCandidate::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaCandidate.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pemilwa_event_id">{{ trans('cruds.pemilwaCandidate.fields.pemilwa_event') }}</label>
                <select class="form-control select2 {{ $errors->has('pemilwa_event') ? 'is-invalid' : '' }}" name="pemilwa_event_id" id="pemilwa_event_id">
                    @foreach($pemilwa_events as $id => $entry)
                        <option value="{{ $id }}" {{ old('pemilwa_event_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pemilwa_event'))
                    <span class="text-danger">{{ $errors->first('pemilwa_event') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pemilwaCandidate.fields.pemilwa_event_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.pemilwa-candidates.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($pemilwaCandidate) && $pemilwaCandidate->image)
      var file = {!! json_encode($pemilwaCandidate->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection