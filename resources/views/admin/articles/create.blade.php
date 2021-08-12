@extends('layouts.admin.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.article.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.articles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.article.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.article.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content') !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.article.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.image_helper') }}</span>
            </div>
            {{-- Bureau --}}
            <div class="form-group">
              <label class="required">{{ trans('cruds.article.fields.bureau') }}</label>
              <select class="form-control {{ $errors->has('bureau') ? 'is-invalid' : '' }}" name="bureau" id="bureau" required>
                  <option value disabled {{ old('bureau', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                  @foreach(App\Models\Article::BUREAU_SELECT as $key => $label)
                      <option value="{{ $key }}" {{ old('bureau', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
              </select>
              @if($errors->has('bureau'))
                  <span class="text-danger">{{ $errors->first('bureau') }}</span>
              @endif
              <span class="help-block">{{ trans('cruds.article.fields.bureau_helper') }}</span>
          </div>
            <div class="form-group">
              <label for="tags">{{ trans('cruds.article.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $tag->id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
              <div class="col-12">
                <label for="">Tags Tambahan</label>
                <div class="row" id="addFieldAppend">

                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-info btn-block" id="addFieldButton">
                    Tambahkan tag lainnya
                    <i class="fa fa-plus-circle ml-2"></i>
                  </button>
                </div>
              </div>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.articles.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $article->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedImageMap = {}
Dropzone.options.imageDropzone = {
    url: '{{ route('admin.articles.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($article) && $article->image)
      var files = {!! json_encode($article->image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
        }
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

{{-- Add On Script --}}
<script>
  let index = 0;
  $(document).ready(function() {
          // Listener for Addfieldbutton
          $("#addFieldButton").click(function(event) {
              event.preventDefault();
              $("#addFieldAppend").append(appendElement(index));
              document.getElementById(`removeSign-${index}`).addEventListener('click', removeFunction);
              index++;
          });

          // Helper dari #addFieldButton onClick (adder)
          function appendElement(numerical){
              $org = `<div class='form-group col-md-12' id='field-${numerical}'>` +
              "<div class='row'>" +
              "<div class='col-md-11'>" +
              "<input type='text' name='add_tags[]' class='form-control' placeholder='Nama Tag' required>" +
              "</div>" +
              "<div class='col-md-1'>" +
              `<button class='btn btn-warning btn-block' id='removeSign-${numerical}'>` +
                  "<i class='fas fa-times-circle'></i>" +
              "</button>" +
              "</div>" +
              "</div>" +
              "</div>";
              return $org;
          }

          // listener dari remover fieldbutton
          function removeFunction(event){
              event.preventDefault();
              if (event.target !== this) {
                  return;
              }
              let removeSignId = event.target.id
              let number = removeSignId.split("-")[1];
              let element = document.getElementById(`field-${number}`);
              element.remove();
              index--;
          } 
      });
  </script>
@endsection