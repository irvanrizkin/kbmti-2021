@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.anggotum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.anggota.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.anggotum.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.anggotum.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram_acc">{{ trans('cruds.anggotum.fields.instagram_acc') }}</label>
                <input class="form-control {{ $errors->has('instagram_acc') ? 'is-invalid' : '' }}" type="text" name="instagram_acc" id="instagram_acc" value="{{ old('instagram_acc', '') }}">
                @if($errors->has('instagram_acc'))
                    <span class="text-danger">{{ $errors->first('instagram_acc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.instagram_acc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_acc">{{ trans('cruds.anggotum.fields.linkedin_acc') }}</label>
                <input class="form-control {{ $errors->has('linkedin_acc') ? 'is-invalid' : '' }}" type="text" name="linkedin_acc" id="linkedin_acc" value="{{ old('linkedin_acc', '') }}">
                @if($errors->has('linkedin_acc'))
                    <span class="text-danger">{{ $errors->first('linkedin_acc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.linkedin_acc_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.anggotum.fields.keanggotaan') }}</label>
                <select class="form-control {{ $errors->has('keanggotaan') ? 'is-invalid' : '' }}" name="keanggotaan" id="keanggotaan" required>
                    <option value disabled {{ old('keanggotaan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Anggotum::KEANGGOTAAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('keanggotaan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('keanggotaan'))
                    <span class="text-danger">{{ $errors->first('keanggotaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.keanggotaan_helper') }}</span>
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
    url: '{{ route('admin.anggota.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
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
@if(isset($anggotum) && $anggotum->image)
      var file = {!! json_encode($anggotum->image) !!}
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