@extends('layouts.admin.admin')
@php
// For testing purpose
    // $arrayedEvent = [];
    $arrayedFields = ['Organisasi', 'Kepanitiaan', 'Tahun_Organisasi', 'Tahun_Kepanitiaan', 'Pemberkasan'];
@endphp
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Pendaftaran Keanggotaan Kepanitiaan
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.event-registrations.customStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <input type="hidden" name="event_id" value="{{ $event->id }}">
                @foreach ($event->eventFields as $field)
                    @if (in_array($field->name, $arrayedFields))
                        @continue
                    @endif
                {{-- @foreach ($arrayedEvent as $field) --}}
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
                {{-- Pemberkasan --}}
                <div class="form-group">
                    <label class="required" for="pemberkasan">Pemberkasan</label>
                    <input type="file" class="needsclick dropzone {{ $errors->has('pemberkasan') ? 'is-invalid' : '' }}" name="pemberkasan" id="pemberkasan">
                    {{-- <div class="needsclick dropzone {{ $errors->has('pemberkasan') ? 'is-invalid' : '' }}" id="pemberkasan">
                    </div> --}}
                    @if($errors->has('pemberkasan'))
                        <span class="text-danger">{{ $errors->first('pemberkasan') }}</span>
                    @endif
                    
                </div>
                {{-- Organisasi --}}
                <div class="form-group col-md-12 mt-4">
                    <label for="">Pengalaman Organisasi</label>
                    <div class="form-row" id="organisasi">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" name="organisasi[]" class="form-control"
                                        placeholder="Nama Organisasi" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="tahun_organisasi[]" class="form-control"
                                        placeholder="Tahun" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" name="organisasi[]" class="form-control"
                                        placeholder="Nama Organisasi" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="tahun_organisasi[]" class="form-control"
                                        placeholder="Tahun" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-block" id="tambahOrg">
                            <i class="fa fa-plus-circle ml-2">Tambah Pengalaman Organisasi</i>
                        </button>
                    </div>    
                </div>
                {{-- Kepanitiaan --}}
                <div class="form-group col-md-12 mt-4">
                    <label for="">Pengalaman Kepanitiaan</label>
                    <div class="form-row" id="kepanitiaan">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" name="kepanitiaan[]" class="form-control"
                                        placeholder="Nama Kepanitiaan" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="tahun_kepanitiaan[]" class="form-control"
                                        placeholder="Tahun" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" name="kepanitiaan[]" class="form-control"
                                        placeholder="Nama Kepanitiaan" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="tahun_kepanitiaan[]" class="form-control"
                                        placeholder="Tahun" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-block" id="tambahPanitia">
                            <i class="fa fa-plus-circle ml-2">Tambah Pengalaman Kepanitiaan</i>
                        </button>
                    </div>    
                </div>
                
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

@section('scripts')
    <script>
        $(document).ready( function () {
            // organisasi
            $org = "<div class='form-group col-md-6'>" +
                "<div class='row'>" +
                "<div class='col-md-9'>" +
                "<input type='text' name='organisasi[]' class='form-control' placeholder='Nama Organisasi' required>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<input type='number' name='tahun_organisasi[]' class='form-control' placeholder='Tahun' required>" +
                "</div>" +
                "</div>" +
                "</div>";
            $("#tambahOrg").click(function() {
                $("#organisasi").append($org);
            });

            // kepanitiaan
            $panitia = "<div class='form-group col-md-6'>" +
                "<div class='row'>" +
                "<div class='col-md-9'>" +
                "<input type='text' name='kepanitiaan[]' class='form-control' placeholder='Nama Kepanitiaan' required>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<input type='number' name='tahun_kepanitiaan[]' class='form-control' placeholder='Tahun' required>" +
                "</div>" +
                "</div>" +
                "</div>";
            $("#tambahPanitia").click(function() {
                $("#kepanitiaan").append($panitia);
            });
        } );
    </script>
@endsection