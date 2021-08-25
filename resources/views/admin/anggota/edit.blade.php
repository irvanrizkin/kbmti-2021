@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.anggotum.title_singular') }}
    </div>

    <div class="card-body">
        {{-- <div class="row">
            <div class="col-12 d-flex flex-column">
                <h2>Avatar</h2>
                @if ($media = $anggotum->getMediaPath())
                    <img src="{{ $media->getUrlPath() }}" alt="" class="img-fluid">     
                @endif
            </div>
        </div> --}}
        <form method="POST" action="{{ route("admin.anggota.update", [$anggotum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.anggotum.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $anggotum->name) }}" required>
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
                <input class="form-control {{ $errors->has('instagram_acc') ? 'is-invalid' : '' }}" type="text" name="instagram_acc" id="instagram_acc" value="{{ old('instagram_acc', $anggotum->instagram_acc) }}">
                @if($errors->has('instagram_acc'))
                    <span class="text-danger">{{ $errors->first('instagram_acc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.instagram_acc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_acc">{{ trans('cruds.anggotum.fields.linkedin_acc') }}</label>
                <input class="form-control {{ $errors->has('linkedin_acc') ? 'is-invalid' : '' }}" type="text" name="linkedin_acc" id="linkedin_acc" value="{{ old('linkedin_acc', $anggotum->linkedin_acc) }}">
                @if($errors->has('linkedin_acc'))
                    <span class="text-danger">{{ $errors->first('linkedin_acc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.linkedin_acc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.anggotum.fields.type') }}</label>
                <select name="type" id="type" class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    <option value="Ketua Departemen" {{ $anggotum->type == "Ketua Departemen" ? 'selected' : '' }}>Ketua Department</option>
                    <option value="Wakil Ketua Departemen {{ $anggotum->type == "Wakil Ketua Departemen" ? 'selected' : '' }}">Wakil Ketua Department</option>
                    <option value="Staff Dept" {{ $anggotum->type == "Staff Dept" ? 'selected' : '' }}>Staff Department</option>
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="caption">{{ trans('cruds.anggotum.fields.caption') }}</label>
                <input class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}" type="text" name="caption" id="caption" value="{{ old('caption', $anggotum->caption) }}">
                @if($errors->has('caption'))
                    <span class="text-danger">{{ $errors->first('caption') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.caption_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.anggotum.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $anggotum->department->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.anggotum.fields.department_helper') }}</span>
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
      $('form').append('<input type="hidden" name="image" value="' + response.path + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($anggotum) && $anggotum->getMediaPath())
      var file = {!! json_encode($anggotum->getMediaPath()) !!}
      this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.path + '">')
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